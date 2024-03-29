<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\DataStores\Traits;

use Exception;
use GoDaddy\WordPress\MWC\Common\Events\Events;
use GoDaddy\WordPress\MWC\Common\Exceptions\BaseException;
use GoDaddy\WordPress\MWC\Common\Exceptions\SentryException;
use GoDaddy\WordPress\MWC\Common\Helpers\ArrayHelper;
use GoDaddy\WordPress\MWC\Common\Helpers\TypeHelper;
use GoDaddy\WordPress\MWC\Common\Repositories\WooCommerce\ProductsRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Commerce;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Exceptions\Contracts\CommerceExceptionContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Events\UpdateProductQuantityConflictEvent;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\InventoryIntegration;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\Contracts\InventoryProviderContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\DataObjects\Level;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\DataObjects\ListSummariesInput;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\DataObjects\Summary;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\DataObjects\UpsertSummaryInput;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Services\Contracts\LevelsServiceContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Services\Operations\CreateOrUpdateLevelOperation;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Services\Operations\ReadLevelOperation;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Models\Contracts\CommerceContextContract;
use GoDaddy\WordPress\MWC\Core\WooCommerce\Adapters\ProductAdapter;
use GoDaddy\WordPress\MWC\Core\WooCommerce\Models\Products\Product;
use WC_Product;

trait CanCrudPlatformInventoryDataTrait
{
    protected LevelsServiceContract $levelsService;
    protected InventoryProviderContract $inventoryProvider;
    protected CommerceContextContract $commerceContext;

    /**
     * {@inheritDoc}
     *
     * This method is overridden to perform inventory updates after the product is created or updated.
     */
    protected function createOrUpdateProductInPlatform(WC_Product $product) : void
    {
        // let the Catalog integration's datastore handle its operations
        parent::createOrUpdateProductInPlatform($product);

        // bail if this product isn't managing stock or writes are disabled
        if (! InventoryIntegration::hasCommerceCapability(Commerce::CAPABILITY_WRITE) || ! $this->productIsManagingOwnStock($product)) {
            return;
        }

        // temporarily disable reads so we don't double-increment inventory quantities
        if ($readsEnabled = InventoryIntegration::hasCommerceCapability(Commerce::CAPABILITY_READ)) {
            InventoryIntegration::disableCapability(Commerce::CAPABILITY_READ);
        }

        // perform the updates
        $this->createOrUpdatePlatformInventoryData($product);

        // restore reads if they were previously enabled
        if ($readsEnabled) {
            InventoryIntegration::enableCapability(Commerce::CAPABILITY_READ);
        }
    }

    /**
     * {@inheritDoc}
     *
     * This method is overridden to read the latest inventory counts for the given product.
     */
    protected function transformProduct(WC_Product $product) : WC_Product
    {
        // let the Catalog integration's datastore handle its transformations
        $product = parent::transformProduct($product);

        if ($this->productIsManagingOwnStock($product)) {
            $product = $this->applyLatestPlatformInventoryData($product);
        }

        return $product;
    }

    /**
     * Creates or updates inventory data in the platform for the given product.
     *
     * @param WC_Product $product
     */
    protected function createOrUpdatePlatformInventoryData(WC_Product $product) : void
    {
        try {
            $nativeProduct = ProductAdapter::getNewInstance($product)->convertFromSource();

            $level = $this->levelsService->createOrUpdateLevel(new CreateOrUpdateLevelOperation($nativeProduct))->getLevel();

            $this->applyPlatformInventoryLevel($product, $level);
            $this->updatePlatformInventorySummary($product, $level);
        } catch (Exception|CommerceExceptionContract $exception) {
            SentryException::getNewInstance('An error occurred trying to create or update the remote inventory for a product: '.$exception->getMessage(), $exception);
        }
    }

    /**
     * Updates the product's platform inventory summary.
     *
     * @param WC_Product $product
     * @param Level $level
     *
     * @throws CommerceExceptionContract|BaseException|Exception
     */
    protected function updatePlatformInventorySummary(WC_Product $product, Level $level) : void
    {
        $lowStockAmount = $product->get_low_stock_amount();

        $summary = Summary::getNewInstance([
            'inventorySummaryId'    => $level->inventorySummaryId,
            'isBackorderable'       => $product->backorders_allowed(),
            'lowInventoryThreshold' => is_numeric($lowStockAmount) ? TypeHelper::int($lowStockAmount, 0) : null,
        ]);

        $this->inventoryProvider->summaries()->update(new UpsertSummaryInput([
            'storeId' => $this->commerceContext->getStoreId(),
            'summary' => $summary,
        ]));
    }

    /**
     * Applies all the latest platform inventory data to the given product.
     *
     * This calls the various remote services to get & set the Woo product's properties.
     *
     * @param WC_Product $product
     *
     * @return WC_Product
     */
    protected function applyLatestPlatformInventoryData(WC_Product $product) : WC_Product
    {
        try {
            $nativeProduct = ProductAdapter::getNewInstance($product)->convertFromSource();

            $level = $this->levelsService->readLevel(new ReadLevelOperation($nativeProduct))->getLevel();

            $level->quantity = $this->calculateLatestLevelQuantity($product, $level);

            $product = $this->applyPlatformInventoryLevel($product, $level);
        } catch (Exception $exception) {
            SentryException::getNewInstance('An error occurred trying to read the remote inventory for a product: '.$exception->getMessage(), $exception);
        }

        return $product;
    }

    /**
     * Applies the given level data to the given product.
     *
     * @param WC_Product $product
     * @param Level      $level
     *
     * @return WC_Product
     */
    protected function applyPlatformInventoryLevel(WC_Product $product, Level $level) : WC_Product
    {
        $product->set_stock_quantity($level->quantity);

        return $product;
    }

    /**
     * Calculates the latest stock quantity for the given product.
     *
     * If the remote quantity differs from the local, we treat the remote quantity as the source of truth and apply only
     * the difference between the local stored & local changed quantities to form the most up-to-date quantity.
     *
     * @param WC_Product $product
     * @param Level $level
     *
     * @return float
     * @throws Exception
     */
    protected function calculateLatestLevelQuantity(WC_Product $product, Level $level) : float
    {
        $remoteQuantity = $level->quantity;
        $existingLocalQuantity = TypeHelper::float(ArrayHelper::get($product->get_data(), 'stock_quantity', 0), 0);
        $newLocalQuantity = TypeHelper::float(ArrayHelper::get($product->get_changes(), 'stock_quantity', $existingLocalQuantity), 0);

        if ($remoteQuantity !== $existingLocalQuantity) {
            $difference = $newLocalQuantity - $existingLocalQuantity;

            $resolvedQuantity = $remoteQuantity + $difference;

            Events::broadcast(UpdateProductQuantityConflictEvent::getNewInstance($existingLocalQuantity, $remoteQuantity, $newLocalQuantity, $resolvedQuantity, ProductAdapter::getNewInstance($product)->convertFromSource()));

            $newLocalQuantity = $resolvedQuantity;
        }

        return $newLocalQuantity;
    }

    /**
     * Reads the product data.
     *
     * This first does the parent (WooCommerce) read, then reads the latest data from the inventory service and applies
     * it on top of that.
     *
     * @param mixed $product
     */
    protected function read_product_data(&$product) : void
    {
        // read from Woo
        parent::read_product_data($product);

        // sanity check for bad actors
        if (! $product instanceof WC_Product) {
            return;
        }

        // only for products that are managing stock
        if (! $this->productIsManagingOwnStock($product)) {
            return;
        }

        // read from the platform
        $this->readPlatformInventoryData($product);
    }

    /**
     * Read the platform inventory data for the given product.
     *
     * @param WC_Product $product
     */
    protected function readPlatformInventoryData(WC_Product $product) : void
    {
        try {
            $level = $this->readPlatformInventoryLevel($product);

            $this->readPlatformInventorySummary($product, $level);
        } catch (Exception|CommerceExceptionContract $exception) {
            SentryException::getNewInstance('An error occurred trying to read the remote inventory for a product: '.$exception->getMessage(), $exception);
        }
    }

    /**
     * Read the platform inventory level for the given product.
     *
     * @param WC_Product $product
     *
     * @return Level
     */
    protected function readPlatformInventoryLevel(WC_Product $product) : Level
    {
        $level = $this->levelsService->readLevel(new ReadLevelOperation(Product::getNewInstance()->setId($product->get_id())))->getLevel();

        $this->applyPlatformInventoryLevel($product, $level);

        return $level;
    }

    /**
     * Read the platform inventory summary for the given product.
     *
     * @param WC_Product $product
     * @param Level $level
     *
     * @return Summary|null
     *
     * @throws CommerceExceptionContract|BaseException|Exception
     */
    protected function readPlatformInventorySummary(WC_Product $product, Level $level) : ?Summary
    {
        $summaries = $this->inventoryProvider->summaries()->list(new ListSummariesInput([
            'storeId' => $this->commerceContext->getStoreId(),
        ]));

        // we currently can't get a specific summary by ID, so we have to list & loop
        foreach ($summaries as $summary) {
            if ($summary->inventorySummaryId === $level->inventorySummaryId) {
                $foundSummary = $summary;
                break;
            }
        }

        if (! isset($foundSummary)) {
            return null;
        }

        $this->applyPlatformInventorySummary($product, $foundSummary);

        return $foundSummary;
    }

    /**
     * Applies the given summary to the given product data.
     *
     * @param WC_Product $product
     * @param Summary $summary
     */
    protected function applyPlatformInventorySummary(WC_Product $product, Summary $summary) : void
    {
        $lowInventoryThreshold = $summary->lowInventoryThreshold;

        if (! is_null($lowInventoryThreshold)) {
            $lowInventoryThreshold = (int) $lowInventoryThreshold;
        }

        $product->set_low_stock_amount($lowInventoryThreshold ?? '');

        $backorders = $product->get_backorders();

        // preserve the Woo backorder setting if it equates to isBackorderable = true in the platform
        if ($summary->isBackorderable) {
            $backorders = 'no' === $backorders ? 'yes' : $backorders;
        } else {
            $backorders = 'no';
        }

        $product->set_backorders($backorders);
    }

    /**
     * Updates a product's stock quantity.
     *
     * @param mixed $productId
     * @param mixed $quantity
     * @param mixed $operation
     *
     * @return float
     */
    public function update_product_stock($productId, $quantity = null, $operation = 'set') : float
    {
        $wooProduct = ProductsRepository::get(TypeHelper::int($productId, 0));
        $quantity = TypeHelper::float($quantity, 0);

        // sanity check for bad values
        if (! $wooProduct instanceof WC_Product) {
            return $quantity;
        }

        try {
            $currentQuantity = $this->readPlatformInventoryLevel($wooProduct)->quantity;

            switch ($operation) {
                case 'increase':
                    $quantity = $currentQuantity + $quantity;
                    break;

                case 'decrease':
                    $quantity = $currentQuantity - $quantity;
                    break;
            }

            $nativeProduct = ProductAdapter::getNewInstance($wooProduct)->convertFromSource()
                ->setCurrentStock($quantity);

            $quantity = $this->levelsService->createOrUpdateLevel(new CreateOrUpdateLevelOperation($nativeProduct))->getLevel()->quantity;
        } catch (Exception $exception) {
            SentryException::getNewInstance('An error occurred trying to update the remote inventory for a product: '.$exception->getMessage(), $exception);
        }

        // call the Woo method to fire hooks and update caches
        parent::update_product_stock($productId, $quantity);

        return $quantity;
    }

    /**
     * Determines if the given product is managing its own stock.
     *
     * This is false for variations that are inheriting stock from their parent.
     *
     * @param WC_Product $product
     *
     * @return bool
     */
    protected function productIsManagingOwnStock(WC_Product $product) : bool
    {
        return $product->managing_stock() && $product->get_id() === $product->get_stock_managed_by_id();
    }
}
