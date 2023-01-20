<?php

namespace GoDaddy\WordPress\MWC\Core\Repositories;

use GoDaddy\WordPress\MWC\Common\Exceptions\BaseException;
use GoDaddy\WordPress\MWC\Common\Helpers\ArrayHelper;
use GoDaddy\WordPress\MWC\Common\Helpers\TypeHelper;
use GoDaddy\WordPress\MWC\Common\Repositories\WordPress\DatabaseRepository;

abstract class AbstractResourceMapRepository
{
    /** @var string type of resources managed by this repository */
    protected string $resourceType;

    /** @var string commerce map uuids table name */
    public const MAP_UUIDS_TABLE = 'godaddy_mwc_commerce_map_uuids';

    /** @var string commerce resource type table name */
    public const RESOURCE_TYPES_TABLE = 'godaddy_mwc_commerce_map_resource_types';

    /**
     * Adds a new map to associate the local ID with the given remote UUID.
     *
     * @param int $localId
     * @param string $remoteId
     *
     * @return void
     * @throws BaseException
     */
    public function add(int $localId, string $remoteId) : void
    {
        DatabaseRepository::insert(static::MAP_UUIDS_TABLE, [
            'local_id'         => $localId,
            'commerce_uuid'    => $remoteId,
            'resource_type_id' => $this->getResourceTypeId(),
        ]);
    }

    /**
     * Finds the remote ID of a resource by its local ID.
     *
     * @param int $localId
     *
     * @return string|null
     */
    public function getRemoteId(int $localId) : ?string
    {
        $uuidMapTableName = static::MAP_UUIDS_TABLE;

        $row = DatabaseRepository::getRow(
            "SELECT map_uuids.commerce_uuid FROM {$uuidMapTableName} AS map_uuids ".
            $this->getResourceTypeJoinClause().' WHERE AND map_uuids.local_id = %d',
            [$localId]
        );

        return TypeHelper::string(ArrayHelper::get($row, 'commerce_uuid'), '') ?: null;
    }

    /**
     * Finds the local ID of a resource by its remote UUID.
     *
     * @param string $uuid
     *
     * @return int|null
     */
    public function getLocalId(string $uuid) : ?int
    {
        $uuidMapTableName = static::MAP_UUIDS_TABLE;

        $row = DatabaseRepository::getRow(
            "SELECT map_uuids.local_id FROM {$uuidMapTableName} AS map_uuids ".
            $this->getResourceTypeJoinClause().' WHERE AND map_uuids.commerce_uuid = %s',
            [$uuid]
        );

        return TypeHelper::int(ArrayHelper::get($row, 'local_id'), 0) ?: null;
    }

    /**
     * Gets the ID of the resource type associated with this repository.
     *
     * @return int|null
     */
    public function getResourceTypeId() : ?int
    {
        $tableName = static::RESOURCE_TYPES_TABLE;

        $row = DatabaseRepository::getRow("SELECT id FROM {$tableName} WHERE name = %s", [$this->resourceType]);

        return TypeHelper::int(ArrayHelper::get($row, 'id'), 0) ?: null;
    }

    /**
     * Gets a SQL clause that can be used to perform an inner join on the resource type tables.
     *
     * @param string $uuidMapTableNameAlias
     * @param string $resourceMapTableNameAlias
     *
     * @return string
     */
    protected function getResourceTypeJoinClause(
        string $uuidMapTableNameAlias = 'map_uuids',
        string $resourceMapTableNameAlias = 'resource_types'
    ) : string {
        $resourceMapTableName = static::RESOURCE_TYPES_TABLE;
        $resourceType = TypeHelper::string(esc_sql($this->resourceType), '');

        return "INNER JOIN {$resourceMapTableName} AS {$resourceMapTableNameAlias}
        ON {$resourceMapTableNameAlias}.id = {$uuidMapTableNameAlias}.resource_type_id
        AND {$resourceMapTableNameAlias}.name = '{$resourceType}'";
    }
}
