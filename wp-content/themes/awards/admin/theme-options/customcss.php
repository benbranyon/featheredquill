<?php
function awards_custom_css( $options = array() ){
	$options = array(
		array(
        'id'          => 'custom_css',
        'label'       => esc_html__( 'Custom CSS', 'awards' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'custom_css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    );

	return apply_filters( 'awards_custom_css', $options );
}   
?>