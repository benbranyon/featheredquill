<?php

namespace GoDaddy\WordPress\MWC\Common\Stores\Contracts;

/**
 * A contract for store repositories.
 */
interface StoreRepositoryContract
{
    /**
     * Gets the store ID.
     *
     * @return string|null
     */
    public function getStoreId() : ?string;

    /**
     * Determines the default store ID.
     *
     * @return string|null
     */
    public function determineDefaultStoreId() : ?string;

    /**
     * Sets the default store ID.
     *
     * @param string $storeId
     * @return void
     */
    public function setDefaultStoreId(string $storeId) : void;
}
