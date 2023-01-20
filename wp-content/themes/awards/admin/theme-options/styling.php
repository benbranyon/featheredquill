<?php
function awards_styling_options( $options = array() ){
	$options = array(
		array(
        'id'          => 'preset_color',
        'label'       => esc_html__( 'Preset Color', 'awards' ),
        'desc'        => esc_html__( 'Main preset color', 'awards' ),
        'std'         => '#fc4446',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'action'      => array(
                array(
                'selector' => '.agency-pagination a:hover,.agency-pagination span:hover,.agency-pagination span.current,.widget_newsletterwidget .tnp-widget .tnp-submit,.comment-reply-link,mark,.site-share li:hover,.progress-bar-custom,.corner-ribbon,.navbar-default .navbar-nav > li.submit:hover a,.navbar-default .navbar-nav > li.submit,.navbar-default .navbar-nav > li > a:before,.site-single-share .cat_list.site-cat a:hover,.pager li:hover > a,.pager li:hover > span,.like-button,.site-vote small,
.single-site .site-tags .cat_list a:hover,.blog-tags .cat_list a:hover,.widget .cat_list a:hover,.pagination li:hover a,.pagination li:focus a,.pagination > .active > a,
.pagination > .active > span,.pagination > .active > a:hover,.pagination > .active > span:hover,.pagination > .active > a:focus,.pagination > .active > span:focus,
.search-top .btn-group.open .dropdown-toggle:focus,.search-top .btn-default:hover,.search-top .btn-group.open .dropdown-toggle:hover,.search-top .btn-default:focus,
.bb,.social-links li,.btn-primary,.btn-primary:hover,.btn-primary:focus,.btn-offical:focus,.btn-offical:hover,.more-link,.pagination li.current a',
                'property'   => 'background-color'
                ),
                array(
                'selector' => 'a,.color,.rating a:hover i,.rating a:focus i,.rating a.active i,.rating a:active i,.rating a:visited i,.breadcrumb > li a,.bb:hover .callout .lead,
.bb:hover .callout h4,.bb:hover .callout h3,.slim-wrap ul.menu-items li a:hover',
                'property'   => 'color'
                ),
                array(
                    'selector' => '.widget_newsletterwidget .tnp-widget .tnp-submit,.site-single-share .cat_list.site-cat a:hover,.pager li:hover > a,.pager li:hover > span,.like-button,.site-vote small,.single-site .site-tags .cat_list a:hover,.blog-tags .cat_list a:hover,.widget .cat_list a:hover,.pagination li:hover a,.pagination li:focus a,
.pagination > .active > a,.pagination > .active > span,.pagination > .active > a:hover,.pagination > .active > span:hover,.pagination > .active > a:focus,.pagination > .active > span:focus,.search-top .btn-group.open .dropdown-toggle:focus,.search-top .btn-default:hover,.search-top .btn-group.open .dropdown-toggle:hover,.search-top .btn-default:focus,
.bb,.social-links li,.btn-primary,.btn-primary:hover,.btn-primary:focus,.btn-offical:focus,.btn-offical:hover,.form-control:focus,.more-link,.pagination li.current a,
.footer li:hover a',
                    'property'   => 'border-color'
                ),
                array(
                    'selector' => '',
                    'property'   => 'border-left-color'
                ),
                array(
                    'selector' => '.header',
                    'property' => 'border-top-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-right-color',
                ),
                array(
                    'selector' => '',
                    'property' => 'border-bottom-color',
                ),
				array(
                    'selector' => '',
                    'property'   => 'border-color',
					'opacity'	=> 0.7,
                ),
				array(
                'selector' => '',
                'property'   => 'background-color',
				'opacity'	=> 0.93,
                ),
            )
      ),
    );

	return apply_filters( 'awards_styling_options', $options );
}  
?>