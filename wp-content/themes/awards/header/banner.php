<?php
	$title = '';
	$subtitle = '';	
	
	if(is_singular('nominee')){
		$title = (function_exists('ot_get_option'))? ot_get_option('nominee_title', 'Recent Nominees') : 'Recent Nominees';
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('nominee_subtitle', 'The latest sites that we offer to your liking. We need your votes!') : 'The latest sites that we offer to your liking. We need your votes!';
	}elseif(is_single()){
		$title = (function_exists('ot_get_option'))? ot_get_option('blog_title', 'Awards Blog') : 'Awards Blog';
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('blog_subtitle', 'Awards blog subtitle goes here') : 'Awards blog subtitle goes here';
	}
	elseif( is_home() ){		
		$title = (function_exists('ot_get_option'))? ot_get_option('blog_title', 'Awards Blog') : 'Awards Blog';
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('blog_subtitle', 'Awards blog subtitle goes here') : 'Awards blog subtitle goes here';
	}
	elseif ( is_category() ){
		$title = esc_html__( 'Category Archives: ', 'awards' ).single_cat_title( '', false );
		if ( category_description() ) :
			$subtitle = category_description();
		endif;

	}
	elseif(is_search()){
		$title = esc_html__('Search Result', 'awards');
		$subtitle = esc_html__( 'This is a Search Results Page for: '. get_search_query(), 'awards' );
	}
	elseif ( is_author() ){
		$title = esc_html__( 'Author Archives: ', 'awards' ).'' . get_the_author() . '';
		if ( category_description() ) :
			$subtitle = category_description();
		endif;
	} 
	elseif( is_tag() ) {
		$title = esc_html__( 'Tag Archives: ', 'awards' ).single_tag_title( '', false );
		if ( tag_description() ) :
			$subtitle = tag_description();
		endif;
	}
	elseif ( is_archive() ){	
			
		if ( is_day() ) :
			$title =  esc_html__( 'Daily Archives: ', 'awards' ).'' . get_the_date() . '';
		elseif ( is_month() ) :
			$title = esc_html__( 'Monthly Archives: ', 'awards' ). '' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'awards' ) ) . '' ;
		elseif ( is_year() ) :
			$title = esc_html__( 'Yearly Archives: ', 'awards' ).'' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'awards' ) ) . '' ;
		else :
			$title = esc_html__( 'Archives', 'awards' );
		endif;
	} 	
	 elseif(is_404()){
		$title = esc_html__('Page Not Found', 'awards');
		$subtitle = esc_html__( 'Sorry page not found...', 'awards');
	}
	elseif( is_page() ){
		$title = get_the_title();
		$custom_title = get_post_meta( get_the_ID(), 'custom_title', true );
		if( $custom_title == 'on' ){
			$alt_title = get_post_meta( get_the_ID(), 'title', true );
			$title = ( $alt_title != '' )? $alt_title : $title;
	
			$alt_subtitle = get_post_meta( get_the_ID(), 'subtitle', true );
			$subtitle = ( $alt_subtitle != '' )? $alt_subtitle : $subtitle;
		}
	}
	else {
		$title = get_the_title();
	}
	
	if(is_post_type_archive('nominee')){
		$title = (function_exists('ot_get_option'))? ot_get_option('nominee_title', 'Recent Nominees') : 'Recent Nominees';
		$subtitle = (function_exists('ot_get_option'))? ot_get_option('nominee_subtitle', 'The latest sites that we offer to your liking. We need your votes!') : 'The latest sites that we offer to your liking. We need your votes!';
	}

?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <div class="section-title page-title">
                    <h3 class="small-title"><?php echo esc_html($title); ?></h3>
                    <p><?php echo wp_kses($subtitle, array('p'=>array())); ?></p>
                   <?php 
					$show_breadcrumbs =  (function_exists('ot_get_option'))? ot_get_option('show_breadcrumbs', 'on') : 'on';
					if($show_breadcrumbs == 'on'):
						awards_breadcrumbs();
					endif; ?>
                </div><!-- end text-widget -->
            </div><!-- end col -->
        </div>
    </div>
</div>