<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataSources\Adapters;

use GoDaddy\WordPress\MWC\Common\Contracts\HasStringRemoteIdentifierContract;
use GoDaddy\WordPress\MWC\Common\DataSources\Contracts\DataSourceAdapterContract;
use GoDaddy\WordPress\MWC\Common\Models\User;
use GoDaddy\WordPress\MWC\Common\Traits\HasStringRemoteIdentifierTrait;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataObjects\Address as CommerceCustomerAddress;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataObjects\CustomerBase;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\Providers\DataObjects\Email;
use GoDaddy\WordPress\MWC\Payments\Models\Customer;

class CustomerBaseAdapter implements DataSourceAdapterContract, HasStringRemoteIdentifierContract
{
    use HasStringRemoteIdentifierTrait;

    /**
     * No-op.
     */
    public function convertFromSource()
    {
        // No-op
    }

    /**
     * {@inheritDoc}
     */
    public function convertToSource(?Customer $customer = null) : ?CustomerBase
    {
        if (! ($customer && $customer->getUser())) {
            return null;
        }

        $user = $customer->getUser();

        return new CustomerBase([
            'id'        => $this->getRemoteId(),
            'firstName' => $user->getFirstName() ?? '',
            'lastName'  => $user->getLastName() ?? '',
            'emails'    => $this->convertToEmails($user),
            'addresses' => $this->convertToAddresses($customer),
        ]);
    }

    /**
     * Convert customer email to array of commerce customer Email objects.
     *
     * @param User $user
     *
     * @return Email[]
     */
    protected function convertToEmails(User $user) : array
    {
        if (! $user->getEmail()) {
            return [];
        }

        return [
            new Email(['email' => $user->getEmail()]),
        ];
    }

    /**
     * Convert customer addresses to array of commerce customer Address objects.
     *
     * @param Customer $customer
     *
     * @return CommerceCustomerAddress[]
     */
    protected function convertToAddresses(Customer $customer) : array
    {
        $addressAdapter = AddressAdapter::getNewInstance();

        return array_filter([
            $addressAdapter->convertToSource($customer->getBillingAddress()),
        ]);
    }
}
