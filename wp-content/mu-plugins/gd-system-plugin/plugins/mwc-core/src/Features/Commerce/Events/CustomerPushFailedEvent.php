<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Events;

use GoDaddy\WordPress\MWC\Core\Features\Commerce\Events\Traits\HasJobTrait;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Exceptions\Contracts\SyncExceptionContract;

class CustomerPushFailedEvent extends AbstractCustomerPushEvent
{
    protected SyncExceptionContract $exception;

    use HasJobTrait;
}
