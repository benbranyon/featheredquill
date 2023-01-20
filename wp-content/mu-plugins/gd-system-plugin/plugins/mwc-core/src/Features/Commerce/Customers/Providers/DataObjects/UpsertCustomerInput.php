<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataObjects;

class UpsertCustomerInput extends AbstractDataObject
{
    public string $storeId;
    public CustomerBase $customer;

    /**
     * @param array{
     *     storeId: string,
     *     customer: CustomerBase,
     *  } $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
