<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'themestall_nominee_meta_boxes' );

function themestall_nominee_meta_boxes(){
  //global $wpdb, $post;
  if( function_exists( 'ot_get_option' ) ):
  $nominee_meta_box = array(
    'id'        => 'nominee_meta_box',
    'title'     => esc_html__('Site Details', 'themestall'),
    'desc'      => '',
    'pages'     => array( 'nominee' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	array(
        'label'       => __( 'Site Info', 'themestall' ),
        'id'          => 'site_info',
        'type'        => 'tab'
    ),
	array(
        'id'           => 'nominee_site_url',
        'label'        => esc_html__('Site URL', 'themestall'),
        'desc'         => '',
        'std'          => '',
        'type'         => 'text',
        'class'        => '',
		'min_max_step' => '',
        'choices'      => array(),
        'condition'	   => '',
        'operator'     => 'and'
    ),
	array(
        'id'           => 'nominee_site_payment_price',
        'label'        => esc_html__('Payment', 'themestall'),
        'desc'         => '',
        'std'          => 'Free',
        'type'         => 'text',
        'class'        => '',
		'min_max_step' => '',
        'choices'      => array(),
        'condition'	   => '',
        'operator'     => 'and'
    ),
	array(
        'label'       => __( 'Author Info', 'themestall' ),
        'id'          => 'author_info',
        'type'        => 'tab'
    ),
	array(
        'id'          => 'author_details_info',
        'label'       => __( 'Author Details', 'catalog' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array(
		  array(
			'id'          => 'details_number',
			'label'       => esc_html__( 'Percentage', 'awards' ),
			'desc'        => '',
			'std'         => '70',
			'type'        => 'numeric-slider',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '0,100,1',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
        )
      ),
	array(
        'label'       => __( 'Awards Info', 'themestall' ),
        'id'          => 'awards_info',
        'type'        => 'tab'
    ),
    array(
        'id'          => 'nominee_awards_winner',
        'label'       => esc_html__('This site award winner?', 'themestall'),
        'desc'        => '',
        'std'         => 'no',
        'type'        => 'radio',
        'class'       => '',
        'rows'		  => 3,
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => __( 'No', 'themestall' ),
            'src'         => ''
          ),
		   array(
            'value'       => 'yes',
            'label'       => __( 'Yes', 'themestall' ),
            'src'         => ''
          ),
        ),
        'operator'    => 'and',
        'condition'	  => ''
      ),
	  )
  );
  
  ot_register_meta_box( $nominee_meta_box );
  endif;  //if( function_exists( 'ot_get_option' ) ):
}
?>