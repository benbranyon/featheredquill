<?php
// Register Style
function awards_admin_styles() {

	wp_register_style( 'awards-style', AWARDSTHEMEURI. 'admin/assets/css/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'awards-style' );
	
	wp_register_script( 'awards-scripts', AWARDSTHEMEURI. 'admin/assets/js/scripts.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'awards-scripts' );

}

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', 'awards_admin_styles' );