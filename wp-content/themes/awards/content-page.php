<div class="content-page">
	<?php 
	$layout_padding = get_post_meta( get_the_ID(), 'layout_padding', true );
	if($layout_padding == 'style_2'){
		$class = 'padding-no-bor';
	} else{
		$class = 'post-padding';
	}
	
	if(class_exists( 'bbPress' )){
		if(is_bbpress()){	
		$class = 'no-padding';
		}
	}
	?>
	<div class="<?php echo esc_attr($class); ?> clearfix">
	<?php the_content(); ?>    
    <?php	
	wp_link_pages( array(	
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'awards' ) . '</span>',		
		'after'       => '</div>',		
		'link_before' => '<span>',		
		'link_after'  => '</span>',		
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'awards' ) . ' </span>%',		
		'separator'   => '<span class="screen-reader-text">, </span>',		
	) );	
	?>
    </div>    
</div>
