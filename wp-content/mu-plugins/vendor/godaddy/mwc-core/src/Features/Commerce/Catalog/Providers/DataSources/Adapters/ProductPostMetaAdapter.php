<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataSources\Adapters;

use GoDaddy\WordPress\MWC\Common\DataSources\Contracts\DataSourceAdapterContract;
use GoDaddy\WordPress\MWC\Common\DataSources\WooCommerce\Adapters\CurrencyAmountAdapter;
use GoDaddy\WordPress\MWC\Common\Helpers\ArrayHelper;
use GoDaddy\WordPress\MWC\Common\Models\CurrencyAmount;
use GoDaddy\WordPress\MWC\Common\Traits\CanGetNewInstanceTrait;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\AbstractOption;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\Inventory;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\ProductBase;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\VariantListOption;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Providers\DataObjects\ExternalId;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Providers\DataObjects\SimpleMoney;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Providers\DataObjects\Value;
use GoDaddy\WordPress\MWC\Core\WooCommerce\Adapters\ProductAdapter;

/**
 * Adapter for converting {@see ProductBase} properties into WordPress metadata.
 *
 * This adapter can be used to convert a {@see ProductBase} DTO into an array of key-values that can be used to fill WordPress metadata for a WooCommerce product.
 *
 * @method static static getNewInstance(ProductBase $productBase)
 */
class ProductPostMetaAdapter implements DataSourceAdapterContract
{
    use CanGetNewInstanceTrait;

    /** @var ProductBase */
    protected ProductBase $source;

    /** @var array<string, array<int, mixed>> array of local metadata - used to compare against the local database */
    protected array $localMeta = [];

    /**
     * Constructor.
     *
     * @param ProductBase $productBase
     */
    public function __construct(ProductBase $productBase)
    {
        $this->source = $productBase;
    }

    /**
     * Gets the local metadata.
     *
     * @return array<string, array<int, mixed>> key is the metakey; value is an array of values
     */
    public function getLocalMeta() : array
    {
        return $this->localMeta;
    }

    /**
     * Sets the local metadata to use in comparisons.
     *
     * @param array<string, array<int, mixed>> $value
     * @return $this
     */
    public function setLocalMeta(array $value) : ProductPostMetaAdapter
    {
        $this->localMeta = $value;

        return $this;
    }

    /**
     * Converts specific properties of a {@see ProductBase} DTO into an array of key-values.
     *
     * The output array is intended to fill WordPress metadata for a WooCommerce product.
     *
     * @return array<string, scalar|array<scalar>>
     */
    public function convertFromSource() : array
    {
        $metaData = [
            '_regular_price' => $this->convertAmountFromSource($this->source->price),
            '_sale_price'    => $this->convertAmountFromSource($this->source->salePrice),
            '_price'         => $this->source->salePrice ? $this->convertAmountFromSource($this->source->salePrice) : $this->convertAmountFromSource($this->source->price),
            '_sku'           => $this->source->sku,
            '_tax_class'     => $this->source->taxCategory ?: '',
        ];

        $metaData = $this->convertTypeFromSource($metaData);
        $metaData = $this->convertInventoryFromSource($metaData);
        $metaData = $this->convertFilesFromSource($metaData);
        $metaData = $this->convertMarketplacesDataFromSource($metaData);
        $metaData = $this->convertWeightAndDimensionsFromSource($metaData);
        $metaData = $this->convertOptionsFromSource($metaData);
        $metaData = $this->convertVariantOptionMappingToSource($metaData);

        return $metaData;
    }

    /**
     * Converts specific properties of a {@see ProductBase} DTO into an array of formatted key-values as expected by WPDB.
     *
     * @param $serialize bool whether to serialize any array values or not (default true)
     * @return array<string, array<string|array<mixed>>>
     */
    public function convertFromSourceToFormattedArray(bool $serialize = true) : array
    {
        $metaData = [];

        foreach ($this->convertFromSource() as $key => $value) {
            if ($serialize) {
                $metaData[$key] = [is_array($value) ? serialize($value) : (string) $value];
            } else {
                $metaData[$key] = [is_scalar($value) ? (string) $value : $value];
            }
        }

        return $metaData;
    }

    /**
     * Adapts the {@see ProdcutBase} product type into WooCommerce product virtual or downloadable metadata.
     *
     * @param array<string, scalar|array<scalar>> $metaData
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertTypeFromSource(array $metaData) : array
    {
        /* @NOTE in WooCommerce _downloadable and _virtual are separated, but they are one in Commerce, this may result in having a physical downloadable product when adapting back in WooCommerce {unfulvio 2023-04-12} */
        $metaData['_virtual'] = in_array($this->source->type, [ProductBase::TYPE_SERVICE, ProductBase::TYPE_DIGITAL], true) ? 'yes' : 'no';
        // if the product has files we override the flag to be downloadable regardless of the product base type
        $metaData['_downloadable'] = ! empty($this->source->files) ? 'yes' : 'no';

        return $metaData;
    }

    /**
     * Adapts source {@see Inventory} data from {@see ProductBase} into WooCommerce product stock metadata.
     *
     * @param array<string, scalar|array<scalar>> $metaData
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertInventoryFromSource(array $metaData) : array
    {
        if (! $this->source->inventory) {
            return $metaData;
        }

        $metaData['_backorders'] = $this->source->inventory->backorderable ? 'yes' : 'no';
        $metaData['_manage_stock'] = $this->source->inventory->externalService ? 'yes' : 'no';
        $metaData['_stock'] = $this->source->inventory->quantity ?: '';

        $stockStatus = 'instock'; // always in stock if not tracking inventory or quantity is null
        if ($this->source->inventory->tracking && null !== $this->source->inventory->quantity && $this->source->inventory->quantity <= 0.0) {
            $stockStatus = 'outofstock';

            // the Catalog API does not support an "on backorder" status, so we have to reference the local database here
            if ('onbackorder' === ArrayHelper::get($this->localMeta, '_stock_status.0')) {
                $stockStatus = 'onbackorder';
            }
        }

        $metaData['_stock_status'] = $stockStatus;

        return $metaData;
    }

    /**
     * Adapts {@see ProductBase} file data into an array of WooCommerce product metadata.
     *
     * @param array<string, scalar|array<scalar>> $metadata
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertFilesFromSource(array $metadata) : array
    {
        $downloadables = [];

        if ($this->source->files) {
            foreach ($this->source->files as $file) {
                $downloadables[$file->objectKey] = [
                    'id'      => $file->objectKey,
                    'name'    => $file->name ?: '',
                    'file'    => $file->url ?: '',
                    'enabled' => true,
                ];
            }
        }

        if (! empty($downloadables)) {
            $metadata['_downloadable_files'] = $downloadables;
        }

        /* @phpstan-ignore-next-line it returns <string, array<string, scalar> which is still good for us */
        return $metadata;
    }

    /**
     * Adapts the weight and dimensions of a {@see ProductBase} into an array of key-values as WooCommerce metadata.
     *
     * @param array<string, scalar|array<scalar>> $metadata
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertWeightAndDimensionsFromSource(array $metadata) : array
    {
        if (! $this->source->shippingWeightAndDimensions) {
            return $metadata;
        }

        $metadata['_height'] = (string) $this->source->shippingWeightAndDimensions->dimensions->height;
        $metadata['_width'] = (string) $this->source->shippingWeightAndDimensions->dimensions->width;
        $metadata['_length'] = (string) $this->source->shippingWeightAndDimensions->dimensions->length;
        $metadata['_weight'] = (string) $this->source->shippingWeightAndDimensions->weight->value;

        return $metadata;
    }

    /**
     * Adapts {@see ProductBase} properties intended for filling a WooCommerce product's marketplaces metadata.
     *
     * @param array<string, scalar|array<scalar>> $metaData
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertMarketplacesDataFromSource(array $metaData) : array
    {
        switch ($this->source->condition) {
            case ProductBase::CONDITION_NEW:
                $metaData[ProductAdapter::MARKETPLACES_CONDITION_META_KEY] = 'new';
                break;
            case ProductBase::CONDITION_RECONDITIONED:
            case ProductBase::CONDITION_REFURBISHED:
                // @NOTE this is intentional as the Marketplaces feature does not include for now a "reconditioned" condition {unfulvio 2023-04-13}
                $metaData[ProductAdapter::MARKETPLACES_CONDITION_META_KEY] = 'refurbished';
                break;
            case ProductBase::CONDITION_USED:
                $metaData[ProductAdapter::MARKETPLACES_CONDITION_META_KEY] = 'used';
                break;
            default:
                $metaData[ProductAdapter::MARKETPLACES_CONDITION_META_KEY] = '';
                break;
        }

        if ($this->source->brand) {
            $metaData[ProductAdapter::MARKETPLACES_BRAND_META_KEY] = $this->source->brand;
        }

        if ($this->source->externalIds) {
            foreach ($this->source->externalIds as $externalId) {
                if (ExternalId::TYPE_GTIN === $externalId->type) {
                    $metaData[ProductAdapter::MARKETPLACES_GTIN_META_KEY] = $externalId->value;
                } elseif (ExternalId::TYPE_MPN === $externalId->type) {
                    $metaData[ProductAdapter::MARKETPLACES_MPN_META_KEY] = $externalId->value;
                }
            }
        }

        return $metaData;
    }

    /**
     * Converts {@see VariantListOption} data from {@see ProductBase} into WooCommerce product attributes metadata.
     *
     * @param array<string, scalar|array<scalar>> $metaData
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertOptionsFromSource(array $metaData) : array
    {
        $attributes = [];
        $i = 0;

        // variations in WooCommerce do not have a `_product_attributes` meta
        if (! empty($this->source->options) && empty($this->source->parentId)) {
            /** @var VariantListOption $attribute */
            foreach ($this->source->options as $attribute) {
                if (! in_array($attribute->type, [AbstractOption::TYPE_VARIANT_LIST, AbstractOption::TYPE_LIST], true)) {
                    continue;
                }

                // product attribute taxonomies in WooCommerce are always prefixed with `pa_`
                $isTaxonomy = strpos($attribute->name, 'pa_') === 0;
                $attributeName = strtolower($attribute->name);

                $attributes[$attributeName] = [
                    'name'         => $isTaxonomy ? $attribute->name : $attribute->presentation,
                    'position'     => $i,
                    'is_visible'   => 1, // currently we don't have this meta value from Commerce, so we must assume visible
                    'is_variation' => (int) (AbstractOption::TYPE_VARIANT_LIST === $attribute->type),
                    'is_taxonomy'  => (int) $isTaxonomy,
                ];

                if ($isTaxonomy) {
                    // for taxonomy attributes values are inferred from attribute taxonomy terms assigned to the product
                    $attributes[$attributeName]['value'] = '';
                } else {
                    // custom attributes are stored as a pipe-separated list of values
                    $values = [];

                    foreach ($attribute->values as $value) {
                        $values[] = $value->presentation;
                    }

                    $values = array_unique($values);

                    // spaces between pipes are intentional
                    $attributes[$attributeName]['value'] = implode(' | ', $values);
                }

                $i++;
            }
        }

        // wipes the attributes meta if no attributes were found
        $metaData['_product_attributes'] = ! empty($attributes) ? $attributes : [];

        /* @phpstan-ignore-next-line the type of array returned still contains scalar values as intended */
        return $metaData;
    }

    /**
     * Converts {@see ProductBase} variant option mapping into WooCommerce product variation attributes metadata.
     *
     * @param array<string, scalar|array<scalar>> $metaData
     * @return array<string, scalar|array<scalar>>
     */
    protected function convertVariantOptionMappingToSource(array $metaData) : array
    {
        // parent variable products don't have direct attribute meta keys
        if (empty($this->source->variantOptionMapping) || empty($this->source->parentId)) {
            return $metaData;
        }

        foreach ($this->source->variantOptionMapping as $attribute) {
            // a taxonomy attribute key will be for example `attribute_pa_color`, while a custom attribute key will be for example `attribute_fabric`
            $metaData['attribute_'.strtolower($attribute->name)] = $attribute->value;
        }

        return $metaData;
    }

    /**
     * Converts a monetary amount from {@see SimpleMoney} to a numerical string intended as WooCommerce metadata.
     *
     * @param SimpleMoney|null $amount
     * @return string numerical value of the amount
     */
    protected function convertAmountFromSource(?SimpleMoney $amount) : string
    {
        if (! $amount) {
            return '';
        }

        return (string) CurrencyAmountAdapter::getNewInstance($amount->value, $amount->currencyCode)
            ->convertToSource(
                CurrencyAmount::getNewInstance()
                    ->setAmount($amount->value)
                    ->setCurrencyCode($amount->currencyCode)
            );
    }

    /**
     * {@inheritDoc}
     */
    public function convertToSource()
    {
        // no-op
    }
}
