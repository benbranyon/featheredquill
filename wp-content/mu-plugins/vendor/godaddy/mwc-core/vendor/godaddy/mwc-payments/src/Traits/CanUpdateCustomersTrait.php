<?php

namespace GoDaddy\WordPress\MWC\Payments\Traits;

use Exception;
use GoDaddy\WordPress\MWC\Payments\Models\Customer;

/**
 * Can update Customers Trait.
 *
 * @since 0.1.0
 */
trait CanUpdateCustomersTrait
{
    use AdaptsRequestsTrait;
    use AdaptsCustomersTrait;

    /**
     * Performs update customer request.
     *
     * @since 0.1.0
     *
     * @param Customer $customer
     *
     * @return Customer
     * @throws Exception
     */
    public function update(Customer $customer) : Customer
    {
        return $this->doAdaptedRequest($customer, new $this->customerAdapter($customer));
    }
}
