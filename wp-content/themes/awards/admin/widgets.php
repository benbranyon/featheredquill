<?php

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Awards 1.0
 */
function awards_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'awards' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'awards' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );

	if( function_exists( 'ot_get_option' ) ):
		$sidebarArr = ot_get_option( 'create_sidebar', array() );
		if( !empty( $sidebarArr ) ){
			$i = 4;
			foreach ($sidebarArr as $sidebar) {

				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => 'sidebar-'.$i,
					'description' => $sidebar['desc'],
					'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="widget-title"><h4>',
					'after_title' => '</h4></div>',
				) );
				$i++;
			}
		}
	endif;	//if( function_exists( 'ot_get_option' ) ):
	
	$footer_widget_top = (function_exists('ot_get_option'))? ot_get_option( 'footer_widget_top', 'on' ) : 'on';
	if($footer_widget_top != 'off'){
	register_sidebar( array(
		'name' => esc_html__( 'Footer Top Widget Area', 'awards' ),
		'id' => 'footer-top-widget-1',
		'description' => esc_html__( 'Appears on footer top widget area', 'awards' ),
		'before_widget' => '<div id="%1$s" class="footer-top-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="right-slide-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	}
	
	if( function_exists( 'ot_get_option' ) ):
		$footer_widget_area = ot_get_option( 'footer_widget_area', 'on' );
		if( $footer_widget_area == 'on' ):
			$footer_widget_box = ot_get_option( 'footer_widget_box', 4 );
			for( $i = 1; $i <= $footer_widget_box; $i++ ):
				register_sidebar( array(
					'name' => sprintf(esc_html__( 'Footer Widget Area %d', 'awards' ), $i),
					'id' => 'footer-'.$i,
					'description' => sprintf(esc_html__( 'Appears in Footer column %d', 'awards' ), $i),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				) );
			endfor; 
		endif;
	endif;	//if( function_exists( 'ot_get_option' ) ):
}
add_action( 'widgets_init', 'awards_widgets_init' );
?>