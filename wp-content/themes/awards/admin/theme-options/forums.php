<?php
function awards_forums_options( $options = array() ){
	$options = array(
	array(
        'id'          => 'forums_title',
        'label'       => esc_html__( 'Forums Header Title', 'awards' ),
        'desc'        => esc_html__( 'Forums page header title', 'awards' ),
        'std'         => 'Community Forum',
        'type'        => 'text',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'forums_subtitle',
        'label'       => esc_html__( 'Forums Header Sub-Title', 'awards' ),
        'desc'        => esc_html__( 'forums page header sub-title', 'awards' ),
        'std'         => 'Add your awesome subtitle here.',
        'type'        => 'text',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'forums_layout',
        'label'       => esc_html__( 'forums layout', 'awards' ),
        'desc'        => esc_html__( 'forums layout', 'awards' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => esc_html__( 'Full width', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'Left sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'Right sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          )
        )
      ),
      array(
        'id'          => 'forums_sidebar',
        'label'       => esc_html__( 'Forums Sidebar', 'awards' ),
        'desc'        => esc_html__( 'Select your forums sidebar', 'awards' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'forums_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'forums_single_layout',
        'label'       => esc_html__( 'Forums single layout', 'awards' ),
        'desc'        => esc_html__( 'Forums single layout', 'awards' ),
        'std'         => 'full',
        'type'        => 'radio-image',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'full',
            'label'       => esc_html__( 'Full width', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'Left sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'Right sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          )
        )
      ),
    array(
        'id'          => 'forums_single_sidebar',
        'label'       => esc_html__( 'Single forums Sidebar', 'awards' ),
        'desc'        => esc_html__( 'Single forums sidebar', 'awards' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'forums_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'forums_single_layout:not(full)',
        'operator'    => 'and'
      )
    );

	return apply_filters( 'awards_forums_options', $options );
}  
?>