<?php
/**
 * Initialize the meta boxes. 
 */

add_action( 'admin_init', 'awards_meta_boxes' );

function awards_meta_boxes() {
  if( function_exists( 'ot_get_option' ) ): 
  $my_meta_box = array(
    'id'        => 'awards_meta_box',
    'title'     => esc_html__('Awards Page Settings', 'awards'),
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	  array(
        'id'          => 'header_settings',
        'label'       => esc_html__('Header Settings', 'awards'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'custom_title',
        'label'       => esc_html__('Custom Title', 'awards'),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'class'       => '',
        'choices'     => array(),
        'condition'	  => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'title',
        'label'       => esc_html__('Title', 'awards'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'custom_title:is(on)'
      ),
      array(
        'id'          => 'subtitle',
        'label'       => esc_html__('Sub Title', 'awards'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'rows'		  => 3,
        'choices'     => array(),
        'operator'    => 'and',
        'condition'	  => 'custom_title:is(on)'
      ),
	  array(
        'id'          => 'header_banner_style',
        'label'       => esc_html__( 'Display Header Banner', 'awards' ),
        'desc'        => esc_html__( 'Header banner display', 'awards' ),
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => ''
      ),
	   array(
        'id'          => 'content_tab',
        'label'       => esc_html__('Layout Settings', 'awards'),      
        'type'        => 'tab',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'page_layout',
        'label'       => esc_html__( 'Default Layout', 'awards' ),
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
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
            'label'       => esc_html__( 'Full Width', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/full-width.png'
          ),
          array(
            'value'       => 'ls',
            'label'       => esc_html__( 'With Left Sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'rs',
            'label'       => esc_html__( 'With Right sidebar', 'awards' ),
            'src'         => OT_URL . '/assets/images/layout/right-sidebar.png'
          ),
        )
      ),
      array(
        'id'          => 'sidebar',
        'label'       => esc_html__('Select Sidebar', 'awards'),
        'desc'        => '',
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'class'       => '',
        'choices'     => array(),
        'operator'    => 'and',
        'condition'   => 'page_layout:not(full)'
      ),
	  array(
        'id'          => 'layout_padding',
        'label'       => esc_html__( 'Layout Padding', 'awards' ),
        'desc'        => esc_html__( 'Layout padding style', 'awards' ),
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'style_1',
            'label'       => esc_html__( 'Padding', 'awards' ),
          ),
		  array(
            'value'       => 'style_2',
            'label'       => esc_html__( 'No Padding', 'awards' ),
          )
        )
      ),
	  array(
        'id'          => 'background_layout',
        'label'       => esc_html__( 'Background Layout', 'awards' ),
        'desc'        => esc_html__( 'Background Layout', 'awards' ),
        'std'         => 'wide',
        'type'        => 'select',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'wide',
            'label'       => esc_html__( 'Wide', 'awards' ),
          ),
          array(
            'value'       => 'boxed',
            'label'       => esc_html__( 'Boxed', 'awards' ),
          )
        )
      ),
	  array(
        'id'          => 'boxed_background_image',
        'label'       => esc_html__( 'Boxed Background Image', 'awards' ),
        'desc'        => esc_html__( 'Boxed background image', 'awards' ),
        'std'         => AWARDSTHEMEURI.'images/wood_03.png',
        'type'        => 'upload',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'background_layout:is(boxed)',
        'operator'    => 'and'
      ),
    )
  );
  
  ot_register_meta_box( $my_meta_box );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>