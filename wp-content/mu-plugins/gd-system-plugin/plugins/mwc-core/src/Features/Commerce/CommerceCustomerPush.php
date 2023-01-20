<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce;

use Exception;
use GoDaddy\WordPress\MWC\Common\Components\Contracts\ComponentContract;
use GoDaddy\WordPress\MWC\Common\Components\Traits\HasComponentsTrait;
use GoDaddy\WordPress\MWC\Common\Configuration\Configuration;
use GoDaddy\WordPress\MWC\Common\Exceptions\BaseException;
use GoDaddy\WordPress\MWC\Common\Exceptions\SentryException;
use GoDaddy\WordPress\MWC\Common\Exceptions\WordPressDatabaseException;
use GoDaddy\WordPress\MWC\Common\Features\AbstractFeature;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Interceptors\CustomerPushInterceptor;

class CommerceCustomerPush extends AbstractFeature
{
    use HasComponentsTrait;

    /** @var string transient that disables the feature */
    public const TRANSIENT_DISABLE_FEATURE = 'godaddy_mwc_commerce_disabled';

    /** @var class-string<ComponentContract>[] alphabetically ordered list of components to load */
    protected array $componentClasses = [
        CreateCommerceMapResourceTypesTableAction::class,
        CreateCommerceMapUuidsTableAction::class,
        CustomerPushInterceptor::class,
    ];

    /**
     * {@inheritDoc}
     */
    public static function getName() : string
    {
        return 'commerce_customer_push';
    }

    /**
     * {@inheritDoc}
     */
    public static function shouldLoad() : bool
    {
        if (get_transient(static::TRANSIENT_DISABLE_FEATURE)) {
            return false;
        }

        return parent::shouldLoad();
    }

    /**
     * Initializes the component.
     *
     * @throws Exception
     */
    public function load() : void
    {
        try {
            /** @throws WordPressDatabaseException|BaseException|Exception */
            $this->loadComponents();
        } catch (WordPressDatabaseException $exception) {
            $this->handleWordPressDatabaseException($exception);
        }
    }

    /**
     * @param WordPressDatabaseException $exception
     */
    protected function handleWordPressDatabaseException(WordPressDatabaseException $exception) : void
    {
        new SentryException($exception->getMessage(), $exception);

        // disable the feature for the duration of this request
        Configuration::set('features.'.static::getName().'.enabled', false);

        // set a transient to temporarily disable the feature, so we don't try to create the tables on every request
        set_transient(static::TRANSIENT_DISABLE_FEATURE, 1, 15 * MINUTE_IN_SECONDS);
    }
}
