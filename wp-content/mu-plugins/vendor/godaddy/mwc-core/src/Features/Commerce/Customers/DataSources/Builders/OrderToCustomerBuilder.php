<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\DataSources\Builders;

use GoDaddy\WordPress\MWC\Common\Models\Address;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Customers\DataSources\WooCommerce\Builders\OrderToCustomerBuilder as WooCommerceOrderToCustomerBuilder;
use GoDaddy\WordPress\MWC\Core\WooCommerce\Models\Orders\Order;

/**
 * Builds a CustomerContract instance from a {@see Order} model.
 *
 * @see WooCommerceOrderToCustomerBuilder a similar builder which uses a WooCommerce order.
 *
 * @extends AbstractOrderToCustomerBuilder<Order>
 */
class OrderToCustomerBuilder extends AbstractOrderToCustomerBuilder
{
    /**
     * {@inheritDoc}
     */
    protected function getCustomerIdFromOrder(object $order) : int
    {
        return $order->getCustomerId() ?? 0;
    }

    /**
     * {@inheritDoc}
     */
    protected function getOrderId(object $order) : int
    {
        return $order->getId() ?? 0;
    }

    /**
     * {@inheritDoc}
     */
    protected function getCustomerInfoFromOrder(object $order)
    {
        // TODO: Implement getCustomerInfoFromOrder() method in MWC-12127.
        return [
            'email'           => '',
            'firstName'       => '',
            'lastName'        => '',
            'billingAddress'  => new Address(),
            'shippingAddress' => new Address(),
        ];
    }
}
