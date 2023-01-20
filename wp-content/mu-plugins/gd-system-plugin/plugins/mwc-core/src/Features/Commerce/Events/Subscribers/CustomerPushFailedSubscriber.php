<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Events\Subscribers;

use GoDaddy\WordPress\MWC\Common\Events\Contracts\EventContract;
use GoDaddy\WordPress\MWC\Common\Events\Contracts\SubscriberContract;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Events\CustomerPushFailedEvent;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Sync\Jobs\AbstractPushJob;

class CustomerPushFailedSubscriber implements SubscriberContract
{
    /**
     * {@inheritDoc}
     */
    public function handle(EventContract $event) : void
    {
        /** @var CustomerPushFailedEvent $event */
        if (! $this->isValidEvent($event)) {
            return;
        }

        /** @var AbstractPushJob $job */
        $job = $event->getJob();

        $job->delete();
    }

    /**
     * Returns true if this event is valid.
     *
     * @param EventContract $event
     *
     * @return bool
     */
    protected function isValidEvent(EventContract $event) : bool
    {
        return $event instanceof CustomerPushFailedEvent && $event->getJob() instanceof AbstractPushJob;
    }
}
