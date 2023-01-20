<?php
function awards_blog_options( $options = array() ){
	$options = array(
	array(
        'id'          => 'blog_title',
        'label'       => esc_html__( 'Blog Header Title', 'awards' ),
        'desc'        => esc_html__( 'Blog page header title', 'awards' ),
        'std'         => 'Awards Blog',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'blog_subtitle',
        'label'       => esc_html__( 'Blog Header Sub-Title', 'awards' ),
        'desc'        => esc_html__( 'Blog page header sub-title', 'awards' ),
        'std'         => 'A basic standard blog page example.',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
		array(
        'id'          => 'blog_layout',
        'label'       => esc_html__( 'Blog layout', 'awards' ),
        'desc'        => esc_html__( 'Blog layout for blog page', 'awards' ),
        'std'         => 'rs',
        'type'        => 'radio-image',
        'section'     => 'blog_options',
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
        'id'          => 'blog_sidebar',
        'label'       => esc_html__( 'Blog Sidebar', 'awards' ),
        'desc'        => esc_html__( 'Select your blog sidebar', 'awards' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'blog_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_layout',
        'label'       => esc_html__( 'Blog single post layout', 'awards' ),
        'desc'        => esc_html__( 'Blog single post layout', 'awards' ),
        'std'         => 'rs',
        'type'        => 'radio-image',
        'section'     => 'blog_options',
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
        'id'          => 'blog_single_sidebar',
        'label'       => esc_html__( 'Single post Sidebar', 'awards' ),
        'desc'        => esc_html__( 'Single post sidebar', 'awards' ),
        'std'         => 'sidebar-1',
        'type'        => 'sidebar-select',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'single_layout:not(full)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sticky_post_text',
        'label'       => esc_html__( 'Sticky post text', 'awards' ),
        'desc'        => esc_html__( 'Sticky post text', 'awards' ),
        'std'         => 'Featured',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'excerpt_length',
        'label'       => esc_html__( 'Excerpt Length', 'awards' ),
        'desc'        => esc_html__( 'Excerpt Length', 'awards' ),
        'std'         => '20',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    );

	return apply_filters( 'awards_blog_options', $options );
}  
?>