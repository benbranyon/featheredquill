<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories;

use GoDaddy\WordPress\MWC\Common\Traits\IsSingletonTrait;
use GoDaddy\WordPress\MWC\Core\Repositories\AbstractResourceMapRepository;

class CustomerMapRepository extends AbstractResourceMapRepository
{
    use isSingletonTrait;

    /** @var string type of resources managed by this repository */
    protected string $resourceType = 'customer';
}
