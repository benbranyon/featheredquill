<?php
//include theme options
include AWARDSTHEMEDIR . '/admin/theme-options/general.php';
include AWARDSTHEMEDIR . '/admin/theme-options/background.php';
include AWARDSTHEMEDIR . '/admin/theme-options/header.php';
include AWARDSTHEMEDIR . '/admin/theme-options/sidebar.php';
include AWARDSTHEMEDIR . '/admin/theme-options/footer.php';
include AWARDSTHEMEDIR . '/admin/theme-options/blog.php';
include AWARDSTHEMEDIR . '/admin/theme-options/nominee.php';
include AWARDSTHEMEDIR . '/admin/theme-options/forums.php';
include AWARDSTHEMEDIR . '/admin/theme-options/typography.php';
include AWARDSTHEMEDIR . '/admin/theme-options/styling.php';
include AWARDSTHEMEDIR . '/admin/theme-options/customcss.php';
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'awards_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function awards_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  //available option functions - return type array()
  $general_options = awards_general_options();
  $background_options = awards_background_options();
  $header_options = awards_header_options();
  $sidebar_options = awards_sidebar_options();
  $footer_options = awards_footer_options();
  $blog_options = awards_blog_options();
  $nominee_options = awards_nominee_options();
  $forums_options = awards_forums_options();
  $typography_options = awards_typography_options();
  $styling_options = awards_styling_options();
  $custom_css = awards_custom_css();


  //merge all available options
  $settings = array_merge( $general_options, $background_options, $header_options, $sidebar_options, $footer_options, $blog_options, $nominee_options, $forums_options, $typography_options, $styling_options, $custom_css );

 

  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => esc_html__( 'General Options', 'awards' )
      ),
      array(
        'id'          => 'background_options',
        'title'       => esc_html__( 'Background Options', 'awards' )
      ),
     array(
        'id'          => 'header_options',
        'title'       => esc_html__( 'Header Options', 'awards' )
      ),
      array(
        'id'          => 'footer_options',
        'title'       => esc_html__( 'Footer Options', 'awards' )
      ),
      array(
        'id'          => 'sidebar_option',
        'title'       => esc_html__( 'Sidebar Options', 'awards' )
      ),
      array(
        'id'          => 'blog_options',
        'title'       => esc_html__( 'Blog Options', 'awards' )
      ),
	  array(
        'id'          => 'nominee_options',
        'title'       => esc_html__( 'Nominee Options', 'awards' )
      ),
	  array(
        'id'          => 'forums_options',
        'title'       => esc_html__( 'Forums Options', 'awards' )
      ),
      array(
        'id'          => 'fonts',
        'title'       => esc_html__( 'Typography Options', 'awards' )
      ),
      array(
        'id'          => 'styling_options',
        'title'       => esc_html__( 'Styling Options', 'awards' )
      ),
      array(
        'id'          => 'custom_css',
        'title'       => esc_html__( 'Custom CSS', 'awards' )
      )
    ),
    'settings'        => $settings
  );

  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;

  return $custom_settings[ 'settings' ];
  
}