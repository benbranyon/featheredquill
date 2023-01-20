<?php
function awards_sidebar_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'create_sidebar',
        'label'       => esc_html__( 'Create Sidebar', 'awards' ),
        'desc'        => esc_html__( 'Click add new to add new sidebar, after adding click save changes', 'awards' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebar_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(           
          array(
            'id'          => 'desc',
            'label'       => esc_html__( 'Description', 'awards' ),
            'desc'        => esc_html__( '(optional)', 'awards' ),
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
    );

	return apply_filters( 'awards_sidebar_options', $options );
}   
?>