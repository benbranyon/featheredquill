<?php

namespace GoDaddy\WordPress\MWC\Common\Stores\Repositories;

use GoDaddy\WordPress\MWC\Common\Configuration\Configuration;
use GoDaddy\WordPress\MWC\Common\Helpers\TypeHelper;
use GoDaddy\WordPress\MWC\Common\Stores\Contracts\StoreRepositoryContract;

/**
 * Abstract store repository class.
 *
 * Contains shared logic between store repositories that may be implemented by different platforms.
 */
abstract class AbstractStoreRepository implements StoreRepositoryContract
{
    /** @var string option key that may be used to store the default store ID */
    const DEFAULT_STORE_ID_OPTION_KEY = 'gd_mwc_default_store_id';

    /** @var string configuration key that may be used to store the default store ID */
    const DEFAULT_STORE_ID_CONFIG_KEY = 'godaddy.store.defaultId';

    /**
     * Gets the store ID from the configuration or wp_options table. Will return null if no value is found.
     *
     * @return string|null
     */
    public function getStoreId() : ?string
    {
        if ($storeId = Configuration::get(static::DEFAULT_STORE_ID_CONFIG_KEY)) {
            return TypeHelper::string($storeId, '');
        }

        if ($storeId = get_option(static::DEFAULT_STORE_ID_OPTION_KEY)) {
            $storeId = TypeHelper::string($storeId, '');

            Configuration::set(static::DEFAULT_STORE_ID_CONFIG_KEY, $storeId);
        }

        return $storeId ?: null;
    }

    /**
     * Sets the default store ID to configuration and option.
     *
     * @param string $storeId
     * @return void
     */
    public function setDefaultStoreId(string $storeId) : void
    {
        Configuration::set(static::DEFAULT_STORE_ID_CONFIG_KEY, $storeId);

        update_option(static::DEFAULT_STORE_ID_OPTION_KEY, $storeId);
    }
}
