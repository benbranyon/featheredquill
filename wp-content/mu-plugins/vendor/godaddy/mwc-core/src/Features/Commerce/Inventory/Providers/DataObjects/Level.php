<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Inventory\Providers\DataObjects;

use GoDaddy\WordPress\MWC\Core\Features\Commerce\Providers\DataObjects\SimpleMoney;

class Level extends AbstractDataObject
{
    public ?string $inventoryLevelId = null;
    public string $inventorySummaryId;
    public string $inventoryLocationId;
    public string $productId;
    public float $quantity;
    public ?SimpleMoney $cost;

    /**
     * Creates a new data object.
     *
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
