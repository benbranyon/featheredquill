<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Sync\Strategies\Contracts;

use GoDaddy\WordPress\MWC\Core\Features\Commerce\Exceptions\Contracts\SyncExceptionContract;

interface PushStrategyContract
{
    /**
     * Push data to external service.
     *
     * @return void
     *
     * @throws SyncExceptionContract
     */
    public function sync() : void;
}
