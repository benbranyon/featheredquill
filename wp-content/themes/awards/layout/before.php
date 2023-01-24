<?php
	$container = 'container';
	$row_class = 'row';
	if(is_singular('nominee')){
		$layout = 'full';
		$container = 'container-fluid';
		$row_class = 'row-fluid';
	}elseif(is_page()){
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
	else{
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
	
	if(is_author()){
		$layout = 'full';
	}
	
	if ( class_exists( 'woocommerce' ) ){
		if( is_product() ){
			$layout = 'full';
		}
		elseif( is_woocommerce() ){
			$layout = 'full';
		}
	}
	
	if( $layout == 'full' ){
		$container_class = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
	}
	else{
		$container_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		$container_class .= ( $layout == 'ls' )? ' pull-right' : '';
	}
?>

<div class="<?php echo esc_attr($container); ?>">

	<?php if(is_singular('nominee')): ?>
	<?php endif; ?>
    
    <div class="<?php echo esc_attr($row_class); ?>">
    
    	<div class="<?php echo esc_attr($container_class); ?>">
