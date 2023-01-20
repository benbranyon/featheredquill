<?php

return [

    /*
     *--------------------------------------------------------------------------
     * Information related to the GoDaddy platform
     *--------------------------------------------------------------------------
     */
    'platform' => [
        'repository' => \GoDaddy\WordPress\MWC\Core\Repositories\ManagedWordPressPlatformRepository::class,
    ],
    /*
     *--------------------------------------------------------------------------
     * Information related to the Commerce store
     *--------------------------------------------------------------------------
     */
    'store' => [
        'shouldDetermineDefaultSiteId' => false,
    ],
];
