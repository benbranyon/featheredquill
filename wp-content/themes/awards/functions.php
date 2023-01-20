<?php
/**
 * Awards functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 */

//Define variable
define('AWARDSTHEMEVERSION', '1.0' );
define('AWARDSTHEMEURI', trailingslashit( get_template_directory_uri() ) );
define('AWARDSTHEMEDIR', trailingslashit( get_template_directory() ) );

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

if ( ! function_exists( 'awards_setup' ) ) :
/**
 * Awards setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
if ( ! function_exists( 'populate_roles' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/schema.php' );
}
populate_roles();
function awards_setup() {

	/*
	 * Make awards available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on awards, use a find and
	 * replace to change THEMESNAME to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'awards', AWARDSTHEMEDIR . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css') );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main-menu'   => esc_html__( 'Main Menu', 'awards' ),
		'side-menu'   => esc_html__( 'Side Menu', 'awards' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'video', 'audio', 'quote', 'link', 'gallery' ) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );
	
	// This theme support woocommerce
	add_theme_support( 'woocommerce' );

}
endif; // awards_setup
add_action( 'after_setup_theme', 'awards_setup' );

/**
 * Theme Options
 */
require AWARDSTHEMEDIR . 'admin/theme-options.php';

/**
 * Function for the back end.
 *
 */
require AWARDSTHEMEDIR . 'admin/functions.php';

require AWARDSTHEMEDIR . 'admin/widgets.php';

/**
 * Enqueue scripts and styles for the front end.
 *
 */
require AWARDSTHEMEDIR . 'include/scripts-css.php';
 
 /*
 * tgm plugins
 *
 */
 require AWARDSTHEMEDIR . 'library/tgm-plugins.php';


/**
 * Function for the front end.
 *
 */
require AWARDSTHEMEDIR . 'include/mr-image-resize.php';
require AWARDSTHEMEDIR . 'include/functions.php';
?>