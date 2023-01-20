<?php
/**
 * Enqueue scripts and styles for the front end.
 *
 */
function awards_scripts() {
	// Add Lato font, used in the main stylesheet.
	$fonts_url = awards_fonts_url();
	if ( ! empty( $fonts_url ) ){
		wp_enqueue_style( 'awards-fonts', esc_url_raw( $fonts_url ), array(), null );
	}
	wp_enqueue_style( 'bootstrap', AWARDSTHEMEURI . 'css/bootstrap.css', array(), null );
	wp_enqueue_style( 'bootstrap-select', AWARDSTHEMEURI . 'css/bootstrap-select.css', array(), null );
	wp_enqueue_style( 'fontawesome-min', AWARDSTHEMEURI . 'css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'animate', AWARDSTHEMEURI . 'css/animate.css', array(), null );
	wp_enqueue_style( 'slimmenu', AWARDSTHEMEURI . 'css/slimmenu.css', array(), null );
	wp_enqueue_style( 'awards-styles', AWARDSTHEMEURI . 'css/style.css', array(), null );		

	// Load our main stylesheet.
	wp_enqueue_style( 'awards-style', get_stylesheet_uri() );
	$custom_css = 'default';
	if( function_exists( 'ot_get_option' ) ):
    $custom_css = ot_get_option('background_layout_style', 'default');
	endif;
	if($custom_css == 'dark'):
	wp_enqueue_style( 'awards-dark', AWARDSTHEMEURI . 'css/dark.css', array(), null );
	endif;
	wp_enqueue_style( 'awards-colors', AWARDSTHEMEURI . 'css/colors.css', array(), null );
	wp_enqueue_style( 'awards-custom-styles', AWARDSTHEMEURI . 'css/custom.css', array(), null );	


	//scripts
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bootstrap', AWARDSTHEMEURI . '/js/bootstrap.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'animate', AWARDSTHEMEURI . '/js/animate.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap-select', AWARDSTHEMEURI . '/js/bootstrap-select.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.easing.min', AWARDSTHEMEURI . 'js/lib/jquery.easing.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.slimmenu.min', AWARDSTHEMEURI . '/js/jquery.slimmenu.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'navgoco', AWARDSTHEMEURI . '/js/navgoco.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery.fitvid', AWARDSTHEMEURI . '/js/jquery.fitvid.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'awards-upload', AWARDSTHEMEURI . '/js/upload.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'validate-min', AWARDSTHEMEURI . '/js/validate-min.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'awards-scripts', AWARDSTHEMEURI . 'js/scripts.js', array( 'jquery' ), '', true );	
	wp_enqueue_script( 'awards-custom', AWARDSTHEMEURI . 'js/custom.js', array( 'jquery' ), '', true );	
}
add_action( 'wp_enqueue_scripts', 'awards_scripts' );

function awards_styles_custom() {
	$custom_css = '';
	wp_enqueue_style('awards-custom-style', AWARDSTHEMEURI . 'css/custom_style.css');
	if( function_exists( 'ot_get_option' ) ):
    $custom_css = ot_get_option('custom_css');
	endif;
    wp_add_inline_style( 'awards-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'awards_styles_custom' );

function awards_styles_custom_banner() {
	wp_enqueue_style('awards-custom-banner-style', AWARDSTHEMEURI . 'css/custom_style_banner.css');
	$custom_css = '';
	$banner_image = '';
	$header_banner_style = get_post_meta(get_the_ID(), 'header_banner_style', true);
	if($header_banner_style == 'style_2'):
		$banner_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		if($banner_image == ''):
			$banner_image = AWARDSTHEMEURI. 'images/demo_01.jpg';
		endif;
	endif;
	if($banner_image != ''){
    $custom_css .= ".looking-photo.nopadbot {
		background-image: url(".esc_url($banner_image).");
	}";    
    }
	
	$background_layout = get_post_meta(get_the_ID(), 'background_layout', true);
	if($background_layout == 'boxed'){
		$boxed_background_image = get_post_meta(get_the_ID(), 'boxed_background_image', true);
		$custom_css .='body.boxed{
			background: url('.esc_url($boxed_background_image).') repeat left center;
		}';
	}
	
	$custom_css .= awards_custom_css_from_theme_options();
    wp_add_inline_style( 'awards-custom-banner-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'awards_styles_custom_banner' );

function awards_custom_enqueue_script() {
	$custom_script = '';
   wp_enqueue_script( 'awards-custom-script', AWARDSTHEMEURI . 'js/custom_script.js', array(), '1.0' );
   if( function_exists( 'ot_get_option' ) ):
   $custom_script = esc_js(ot_get_option( 'footer_scripts' ));
   endif;
   wp_add_inline_script( 'awards-custom-script', $custom_script );
}
add_action( 'wp_enqueue_scripts', 'awards_custom_enqueue_script' );
?>