<?php

define( 'GD_VIP', '#GD_VIP#' );
define( 'GD_RESELLER', #RESELLER_ID# );
define( 'GD_ASAP_KEY', '#GD_ASAP_KEY#' );
define( 'GD_STAGING_SITE', #GD_STAGING_SITE# );
define( 'GD_EASY_MODE', #GD_EASY_MODE# );
define( 'GD_SITE_CREATED', #GD_SITE_CREATED# );

// Newrelic tracking
if ( function_exists( 'newrelic_set_appname' ) ) {
	newrelic_set_appname( '#NEWRELIC_GUID#;' . ini_get( 'newrelic.appname' ) );
}

/**
 * Is this is a mobile client?  Can be used by batcache.
 * @return array
 */
function is_mobile_user_agent() {
	return array(
	       "mobile_browser"             => !in_array( $_SERVER['HTTP_X_UA_DEVICE'], array( 'bot', 'pc' ) ),
	       "mobile_browser_tablet"      => false !== strpos( $_SERVER['HTTP_X_UA_DEVICE'], 'tablet-' ),
	       "mobile_browser_smartphones" => in_array( $_SERVER['HTTP_X_UA_DEVICE'], array( 'mobile-iphone', 'mobile-smartphone', 'mobile-firefoxos', 'mobile-generic' ) ),
	       "mobile_browser_android"     => false !== strpos( $_SERVER['HTTP_X_UA_DEVICE'], 'android' )
	);
}
