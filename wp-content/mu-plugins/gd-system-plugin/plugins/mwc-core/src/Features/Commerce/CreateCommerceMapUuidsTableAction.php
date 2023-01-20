<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce;

use GoDaddy\WordPress\MWC\Common\Database\AbstractDatabaseTableAction;
use GoDaddy\WordPress\MWC\Common\Repositories\WordPress\DatabaseRepository;
use GoDaddy\WordPress\MWC\Core\Repositories\AbstractResourceMapRepository;

class CreateCommerceMapUuidsTableAction extends AbstractDatabaseTableAction
{
    /** {@inheritDoc} */
    public static function getTableName() : string
    {
        return AbstractResourceMapRepository::MAP_UUIDS_TABLE;
    }

    /** {@inheritDoc} */
    protected static function getTableVersion() : int
    {
        return 20221214102100;
    }

    /** {@inheritdoc} */
    protected function createTable() : void
    {
        $resourceTypesTableName = CreateCommerceMapResourceTypesTableAction::getTableName();

        DatabaseRepository::createTable(
            static::getTableName(),
            [
                'id'               => ['BIGINT', 'UNSIGNED', 'NOT NULL', 'AUTO_INCREMENT'],
                'resource_type_id' => ['SMALLINT', 'UNSIGNED', 'NOT NULL'],
                'local_id'         => ['BIGINT', 'UNSIGNED', 'NOT NULL'],
                'commerce_uuid'    => ['CHAR(36)', 'NOT NULL'],
            ],
            [
                'PRIMARY KEY (id)',
                'UNIQUE KEY (resource_type_id, local_id)',
                'UNIQUE KEY (commerce_uuid, resource_type_id)',
            ],
            [
                // cannot delete a row from godaddy_mwc_commerce_map_resource_types if there's a row that references it on this table
                "FOREIGN KEY (resource_type_id) REFERENCES {$resourceTypesTableName}(id) ON DELETE RESTRICT",
            ]
        );
    }
}
