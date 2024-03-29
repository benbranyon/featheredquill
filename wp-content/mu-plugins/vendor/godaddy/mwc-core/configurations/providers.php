<?php

return [
    /*
     * Implementations of the AuthProviderContract for various services.
     */
    'auth' => [
        'godaddy' => [
            'mwc' => [
                /*
                 * Implementation of the authentication provider for the MWC API.
                 */
                'api' => GoDaddy\WordPress\MWC\Core\Auth\Providers\Platform\AuthProvider::class,

                /*
                 * Implementation of the authentication provider for the Events API.
                 */
                'events_api' => GoDaddy\WordPress\MWC\Core\Auth\Providers\Platform\AuthProvider::class,

                /*
                 * Implementation of the authentication provider for the Emails Service.
                 */
                'emails_service' => GoDaddy\WordPress\MWC\Core\Auth\Providers\EmailsService\JwtAuthProvider::class,

                /*
                 * Implementation of the authentication provider for the Marketplaces API.
                 */
                'marketplaces' => GoDaddy\WordPress\MWC\Core\Auth\Providers\Marketplaces\API\AuthProvider::class,
            ],
        ],
    ],
    /*
     * Service providers that will be registered with the container.
     */
    'service' => [
        'core' => [
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\CommerceContextServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\IdProviderServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Catalog\CatalogProviderServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Catalog\ListProductsCachingServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Catalog\ListProductsServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Catalog\ProductsMappingServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Catalog\ProductsServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Customers\CustomersMappingServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Customers\CustomersProviderServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Customers\CustomersServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Inventory\InventoryMappingServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Inventory\InventoryProviderServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Inventory\InventoryServicesServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\OrderMapRepositoryServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\OrdersProviderServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\OrdersMappingServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\OrderReservationsServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\OrdersServiceServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\LineItemMappingServiceProvider::class,
            GoDaddy\WordPress\MWC\Core\Providers\Commerce\Orders\NoteMappingServiceProvider::class,
        ],
        // overridable providers: plugins that include mwc-core (woosaas-system-plugin) may override these by array key
        'platformRepo' => GoDaddy\WordPress\MWC\Core\Providers\PlatformRepositoryServiceProvider::class,
        'storeRepo'    => GoDaddy\WordPress\MWC\Core\Providers\StoreRepositoryServiceProvider::class,
    ],
];
