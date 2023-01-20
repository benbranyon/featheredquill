<?php
if ( ! function_exists('themestall_pricing_post_type') ) {

// Register Custom Post Type
function themestall_pricing_post_type() {

	$labels = array(
		'name'                => _x( 'Pricing tables', 'Post Type General Name', 'awards' ),
		'singular_name'       => _x( 'Pricing table', 'Post Type Singular Name', 'awards' ),
		'menu_name'           => __( 'Pricing table', 'awards' ),
		'parent_item_colon'   => __( 'Parent Item:', 'awards' ),
		'all_items'           => __( 'All Items', 'awards' ),
		'view_item'           => __( 'View Item', 'awards' ),
		'add_new_item'        => __( 'Add New Item', 'awards' ),
		'add_new'             => __( 'Add New', 'awards' ),
		'edit_item'           => __( 'Edit Item', 'awards' ),
		'update_item'         => __( 'Update Item', 'awards' ),
		'search_items'        => __( 'Search Item', 'awards' ),
		'not_found'           => __( 'Not found', 'awards' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'awards' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'pricing', $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_pricing_post_type', 0 );

}


include 'meta-boxes-pricing.php';

?>