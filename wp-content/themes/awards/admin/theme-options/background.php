<?php
function awards_background_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'background_layout_style',
        'label'       => esc_html__( 'Background Layout', 'awards' ),
        'desc'        => esc_html__( 'Background Layout', 'awards' ),
        'std'         => 'default',
        'type'        => 'select',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => esc_html__( 'Default', 'awards' ),
          ),
		  array(
            'value'       => 'dark',
            'label'       => esc_html__( 'Dark', 'awards' ),
          ),
        )
      ),
		array(
        'id'          => 'container_width',
        'label'       => esc_html__( 'Container width', 'awards' ),
        'desc'        => esc_html__( 'Main container width', 'awards' ),
        'std'         => array(1170, 'px'),
        'type'        => 'measurement',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      =>array(
                array(
                    'selector' => '.container',
                    'property' => 'max-width'
                    )
            )
      ),
      array(
        'id'          => 'body_background',
        'label'       => esc_html__( 'Body background', 'awards' ),
        'desc'        => esc_html__( 'Background can be image or color', 'awards' ),
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => 'body'
                    )
            )
      ),
      array(
        'id'          => 'main_container_background',
        'label'       => esc_html__( 'Main container background', 'awards' ),
        'desc'        => esc_html__( 'Background can be image or color', 'awards' ),
        'std'         => array(),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.container'
                    )
            )
      ),
    array(
        'id'          => 'sidebar_background',
        'label'       => esc_html__( 'Sidebar background', 'awards' ),
        'desc'        => esc_html__( 'Sidebar Background', 'awards' ),
        'std'         => array('background-image' => '', 'background-color' => ''),
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'   => array(
                array(
                    'selector' => '.sidebar'
                    )
            )
      ),     
    );

	return apply_filters( 'awards_background_options', $options );
}  
?>