<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Operations;

use GoDaddy\WordPress\MWC\Common\Traits\CanSeedTrait;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Operations\Contracts\CreateOrUpdateProductOperationContract;
use GoDaddy\WordPress\MWC\Core\WooCommerce\Models\Products\Product;

/**
 * Create or update a product operation.
 */
class CreateOrUpdateProductOperation implements CreateOrUpdateProductOperationContract
{
    use CanSeedTrait;

    /** @var Product the Product model */
    protected Product $product;

    /** @var int the product's local WooCommerce ID */
    protected int $localId;

    /**
     * Creates an operation from a given Product.
     *
     * @param Product $product
     * @return CreateOrUpdateProductOperation
     */
    public static function fromProduct(Product $product) : CreateOrUpdateProductOperation
    {
        return static::seed([
            'product' => $product,
            'localId' => $product->getId(),
        ]);
    }

    /**
     * Sets the Product.
     *
     * @param Product $value
     * @return CreateOrUpdateProductOperation
     */
    public function setProduct(Product $value) : CreateOrUpdateProductOperation
    {
        $this->product = $value;

        return $this;
    }

    /**
     * Gets the Product.
     *
     * @return Product
     */
    public function getProduct() : Product
    {
        return $this->product;
    }

    /**
     * Sets the local ID.
     *
     * @param int $value
     * @return CreateOrUpdateProductOperation
     */
    public function setLocalId(int $value) : CreateOrUpdateProductOperation
    {
        $this->localId = $value;

        return $this;
    }

    /**
     * Gets the local ID.
     *
     * @return int
     */
    public function getLocalId() : int
    {
        return $this->localId;
    }
}
