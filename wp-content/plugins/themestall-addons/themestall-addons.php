<?php
/*
  Plugin Name: ThemeStall Add-ons
  Plugin URI: http://theme-stall.com/plugins/themestall-add-ons
  Version: 1.0
  Author: ThemeStall
  Author URI: http://theme-stall.com/plugins/themestall-add-ons
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: themestall
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'TS_PLUGIN_FILE', __FILE__ );
define( 'TS_PLUGIN_VERSION', '1.0' );
define( 'TS_ENABLE_CACHE', true );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
//require_once 'inc/core/vote.php';
require_once 'inc/core/counters.php';
require_once 'inc/pricing/pricing-post-type.php';
require_once 'inc/nominee/post-type.php';
require_once 'inc/login-register/email.php';

function themestall_rewrite_flush() {
    themestall_nominee_post_type();
	themestall_pricing_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'themestall_rewrite_flush' );

function themestall_new_contactmethods( $themestall_contactmethods ) {
	// Add Twitter
	$themestall_contactmethods['twitter'] = esc_html__('Twitter', 'themestall');
	//add Country
	$themestall_contactmethods['country'] = esc_html__('Country', 'themestall');
	//add Designation
	$themestall_contactmethods['designation'] = esc_html__('Designation', 'themestall');
	//add Budget
	$themestall_contactmethods['budget'] = esc_html__('Budget', 'themestall');
	 
	return $themestall_contactmethods;
}
add_filter('user_contactmethods','themestall_new_contactmethods',10,1);

require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );
