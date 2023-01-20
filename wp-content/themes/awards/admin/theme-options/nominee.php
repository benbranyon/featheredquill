<?php
function awards_nominee_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'nominee_title',
        'label'       => esc_html__( 'Nominee Header Title', 'awards' ),
        'desc'        => esc_html__( 'Nominee page header title', 'awards' ),
        'std'         => 'Recent Nominees',
        'type'        => 'text',
        'section'     => 'nominee_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'nominee_subtitle',
        'label'       => esc_html__( 'Nominee Header Sub-Title', 'awards' ),
        'desc'        => esc_html__( 'Nominee page header sub-title', 'awards' ),
        'std'         => 'The latest sites that we offer to your liking. We need your votes!',
        'type'        => 'text',
        'section'     => 'nominee_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'awards_nominee_options', $options );
}  
?>