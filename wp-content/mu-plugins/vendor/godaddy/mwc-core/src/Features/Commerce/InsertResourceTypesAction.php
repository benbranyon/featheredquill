<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce;

use GoDaddy\WordPress\MWC\Common\Components\Contracts\ConditionalComponentContract;
use GoDaddy\WordPress\MWC\Common\Exceptions\WordPressDatabaseException;
use GoDaddy\WordPress\MWC\Common\Helpers\TypeHelper;
use GoDaddy\WordPress\MWC\Common\Repositories\WordPress\DatabaseRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Orders\Repositories\NoteMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Orders\Repositories\OrderMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\CustomerMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\GuestCustomerMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\LevelMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\LineItemMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\LocationMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\ProductMapRepository;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Repositories\ReservationMapRepository;
use GoDaddy\WordPress\MWC\Core\Repositories\AbstractResourceMapRepository;

class InsertResourceTypesAction implements ConditionalComponentContract
{
    /** @var string action name */
    protected const NAME = 'godaddy_mwc_commerce_insert_resource_types_action';

    /**
     * Gets action's name.
     *
     * @return string
     */
    protected static function getName() : string
    {
        return static::NAME;
    }

    /**
     * Gets the time of the latest run of the action using YmdHis format.
     *
     * @return int
     */
    protected static function getVersion() : int
    {
        return 202305010000000;
    }

    /**
     * Gets the option name for storing the latest run time.
     *
     * @return string
     */
    protected static function getVersionOptionName() : string
    {
        return static::getName().'_version';
    }

    /**
     * {@inheritDoc}
     * @throws WordPressDatabaseException
     */
    public function load() : void
    {
        $this->run();
        $this->updateActionVersion();
    }

    /**
     * Updates action's run option version.
     *
     * @return void
     */
    protected function updateActionVersion() : void
    {
        update_option(static::getVersionOptionName(), static::getVersion());
    }

    /**
     * Runs the action.
     *
     * @return void
     * @throws WordPressDatabaseException
     */
    protected function run() : void
    {
        $resourceTypes = [
            CustomerMapRepository::RESOURCE_TYPE,
            GuestCustomerMapRepository::RESOURCE_TYPE,
            ProductMapRepository::RESOURCE_TYPE,
            LevelMapRepository::RESOURCE_TYPE,
            LocationMapRepository::RESOURCE_TYPE,
            ReservationMapRepository::RESOURCE_TYPE,
            OrderMapRepository::RESOURCE_TYPE,
            LineItemMapRepository::RESOURCE_TYPE,
            NoteMapRepository::RESOURCE_TYPE,
        ];

        foreach ($resourceTypes as $name) {
            $this->insertResourceType($name);
        }
    }

    /**
     * Insert a resource type row with the given name, if it does not exist.
     *
     * @param string $name value for the name column
     *
     * @return bool true if new row inserted, false if row already exists
     * @throws WordPressDatabaseException
     */
    protected function insertResourceType(string $name) : bool
    {
        $tableName = AbstractResourceMapRepository::RESOURCE_TYPES_TABLE;
        $query = <<<EOS
INSERT INTO {$tableName} (name)
SELECT %s AS name FROM {$tableName} WHERE name = %s HAVING COUNT(*) = 0;
EOS;
        $wpdb = DatabaseRepository::instance();
        $preparedQuery = TypeHelper::string($wpdb->prepare($query, $name, $name), '');

        if (! $preparedQuery) {
            throw new WordPressDatabaseException('Could not prepare insert SQL statement.');
        }

        $result = $wpdb->query($preparedQuery);

        if (false === $result || $wpdb->last_error) {
            if ('Unknown error 1213' === $wpdb->last_error) {
                return false;
            }
            throw new WordPressDatabaseException($wpdb->last_error ?: 'Could not insert resource type row.');
        }

        return (bool) $result;
    }

    /**
     * {@inheritDoc}
     */
    public static function shouldLoad() : bool
    {
        return static::getVersion() > TypeHelper::int(get_option(static::getVersionOptionName()), 0);
    }
}
