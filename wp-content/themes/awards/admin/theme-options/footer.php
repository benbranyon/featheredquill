<?php
function awards_footer_options( $options = array() ){
	$choice= array( 
          array(
            'value'       => 'facebook',
            'label'       => esc_html__( 'Facebook', 'awards' ),
            'src'         => ''
          ),
          array(
            'value'       => 'twitter',
            'label'       => esc_html__( 'Twitter', 'awards' ),
            'src'         => ''
          ),
          array(
            'value'       => 'pinterest',
            'label'       => esc_html__( 'Pinterest', 'awards' ),
            'src'         => ''
          ),
          array(
            'value'       => 'googleplus',
            'label'       => esc_html__( 'Google+', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'rss',
            'label'       => esc_html__( 'RSS', 'awards' ),
            'src'         => ''
          ),
          array(
            'value'       => 'instagram',
            'label'       => esc_html__( 'Instagram', 'awards' ),
            'src'         => ''
          ),
          array(
            'value'       => 'linkedin',
            'label'       => esc_html__( 'LinkdIn', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'behance',
            'label'       => esc_html__( 'Behance', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'digg',
            'label'       => esc_html__( 'Digg', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'dribbble',
            'label'       => esc_html__( 'Dribbble', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'flickr',
            'label'       => esc_html__( 'Flickr', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'forrst',
            'label'       => esc_html__( 'Forrst', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'html5',
            'label'       => esc_html__( 'Html5', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'icloud',
            'label'       => esc_html__( 'Icloud', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'lastfm',
            'label'       => esc_html__( 'Lastfm', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'myspace',
            'label'       => esc_html__( 'Myspace', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'paypal',
            'label'       => esc_html__( 'Paypal', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'picasa',
            'label'       => esc_html__( 'Picasa', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'reddit',
            'label'       => esc_html__( 'Reddit', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'skype',
            'label'       => esc_html__( 'Skype', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'stumbleupon',
            'label'       => esc_html__( 'Stumbleupon', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'tumblr',
            'label'       => esc_html__( 'Tumblr', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'vimeo',
            'label'       => esc_html__( 'Vimeo', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'wordpress',
            'label'       => esc_html__( 'WordPress', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'yahoo',
            'label'       => esc_html__( 'Yahoo', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'youtube',
            'label'       => esc_html__( 'Youtube', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'github',
            'label'       => esc_html__( 'Github', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'yelp',
            'label'       => esc_html__( 'Yelp', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'mail',
            'label'       => esc_html__( 'Mail', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'instagram',
            'label'       => esc_html__( 'Instagram', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'foursquare',
            'label'       => esc_html__( 'Foursquare', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'zerply',
            'label'       => esc_html__( 'Zerply', 'awards' ),
            'src'         => ''
          ),
		  array(
            'value'       => 'vk',
            'label'       => esc_html__( 'VK', 'awards' ),
            'src'         => ''
          ),
        );
	$options = array(
	  array(
        'id'          => 'footer_widget_area',
        'label'       => esc_html__( 'Footer widget area', 'awards' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_widget_box',
        'label'       => esc_html__( 'Footer widget box', 'awards' ),
        'desc'        => '',
        'std'         => '4',
        'type'        => 'numeric-slider',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '1,4,1',
        'class'       => '',
        'condition'   => 'footer_widget_area:not(off)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copyright_text',
        'label'       => esc_html__( 'Copyright Text', 'awards' ),
        'desc'        => '',
        'std'         => 'Copyrights &copy; '.date('Y').' <a href="#">ThemeStall</a> All Rights Reserved.',
        'type'        => 'textarea',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'social_links',
        'label'       => esc_html__( 'Social Links', 'awards' ),
        'desc'        => esc_html__( 'Social links', 'awards' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'link',
            'label'       => esc_html__( 'Link', 'awards' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'class',
            'label'       => esc_html__( 'Select Social Name', 'awards' ),
            'desc'        => esc_html__('exemple: facebook', 'awards'),
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => $choice
          ),
        ),
      ),
      array(
        'id'          => 'footer_scripts',
        'label'       => esc_html__( 'Footer scripts', 'awards' ),
        'desc'        => esc_html__( 'Custom script add footer part', 'awards' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_options',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    );

	return apply_filters( 'awards_footer_options', $options );
}  
?>