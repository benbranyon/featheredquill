<?php
function awards_general_options( $options = array() ){
	
	$options = array(
	  array(
        'id'          => 'main_logo',
        'label'       => esc_html__( 'Header Logo', 'awards' ),
        'desc'        => esc_html__( 'Header logo', 'awards' ),
        'std'         => AWARDSTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'admin_logo',
        'label'       => esc_html__( 'Admin Logo', 'awards' ),
        'desc'        => esc_html__( 'Admin login logo', 'awards' ),
        'std'         => AWARDSTHEMEURI. 'images/logo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'footer_logo',
        'label'       => esc_html__( 'Footer Logo', 'awards' ),
        'desc'        => esc_html__( 'Footer login logo', 'awards' ),
        'std'         => AWARDSTHEMEURI. 'images/flogo.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'preloader',
        'label'       => esc_html__( 'Preloader Image', 'awards' ),
        'desc'        => esc_html__( 'Preloder image', 'awards' ),
        'std'         => AWARDSTHEMEURI. 'images/loader.gif',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	);

	return apply_filters( 'awards_general_options', $options );
}
?>