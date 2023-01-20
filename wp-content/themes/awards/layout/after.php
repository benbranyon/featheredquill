<?php
	if(is_singular('nominee')){
		$layout = 'full';
	}elseif(is_page()) {
		$layout = get_post_meta( get_the_ID(), 'page_layout', true );
		if($layout != ''){
			$layout = $layout;
		} else {
			$layout = 'rs';
		}
	}
	elseif(is_single()){
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'single_layout', 'rs' ) : 'rs';
	}
	else {
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'blog_layout', 'rs' ) : 'rs';
	}
	
	if(class_exists( 'bbPress' )){
		if(is_bbpress()){	
		$layout = (function_exists('ot_get_option'))? ot_get_option( 'forums_layout', 'full' ) : 'full';
		}
	}
	
	if(is_post_type_archive('nominee')){
		$layout = 'full';
	}
	
	if(get_query_var('nominee_category')|| get_query_var('nominee_tag') || get_query_var('nominee_software') || get_query_var('nominee_color')){
		$layout = 'full';
	}
	
	if(is_author() || is_search()){
		$layout = 'full';
	}
	
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$layout = 'full';
		}
		elseif( is_woocommerce() || is_cart() || is_checkout() ){
			$layout = 'full';
		}
	}

?>
</div>

	<?php if( $layout != 'full' ): ?>
    
    <div id="sidebar" class="sidebar col-md-3 col-sm-12 col-xs-12">
    
        <?php get_sidebar(); ?>
        			
    </div>
    
    <?php endif; // endif ?>
     
    </div>
    
</div>
<!-- Content Wrap -->