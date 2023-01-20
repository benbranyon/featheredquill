<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Awards
 * @since Awards 1.0
 */

if(is_page()){
	$sidebar = get_post_meta( get_the_ID(), 'sidebar', true );		
	if($sidebar == '') $sidebar = 'sidebar-1';
}
elseif(is_single()){
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_single_sidebar', 'sidebar-1' ) : 'sidebar-1';
}
else {
	$sidebar = (function_exists('ot_get_option'))? ot_get_option( 'blog_sidebar', 'sidebar-1' ) : 'sidebar-1';
}
?>
	

<div class="sidebar widget-area">
	<?php if ( is_active_sidebar( $sidebar ) ) : ?>
		<?php dynamic_sidebar( $sidebar ); ?>
	<?php endif; ?>
</div><!-- .sidebar -->
