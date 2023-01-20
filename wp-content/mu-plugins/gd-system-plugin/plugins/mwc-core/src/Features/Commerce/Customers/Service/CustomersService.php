<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Service;

use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\Contracts\CustomersProviderContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Service\Contracts\CustomersServiceContract;
use GoDaddy\WordPress\MWC\Payments\Models\Customer;

class CustomersService implements CustomersServiceContract
{
    /** @var string */
    protected string $storeId;

    /** @var CustomersProviderContract */
    protected CustomersProviderContract $customersProvider;

    /**
     * Constructor.
     *
     * @param string $storeId
     * @param CustomersProviderContract $customersProvider
     */
    public function __construct(string $storeId, CustomersProviderContract $customersProvider)
    {
        $this->storeId = $storeId;
        $this->customersProvider = $customersProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function createOrUpdateCustomer(Customer $customer) : Customer
    {
        // TODO: Implement createOrUpdateCustomer() method.
        return $customer;
    }

    /**
     * Gets an instance of the service with the default store ID and customer provider.
     *
     * @param string|null $storeId
     * @param CustomersProviderContract|null $customersProvider
     *
     * @return CustomersService
     */
    public static function getNewInstance(string $storeId = null, CustomersProviderContract $customersProvider = null) : CustomersService
    {
        // TODO: Implement getNewInstance() method.
        /* @phpstan-ignore-next-line */
        return null;
    }
}
