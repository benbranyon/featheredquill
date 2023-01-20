<?php
if ( ! function_exists('themestall_nominee_post_type') ) {

// Register Custom Post Type
function themestall_nominee_post_type() {

	$labels = array(
		'name'                => _x( 'Nominees', 'Post Type General Name', 'themestall' ),
		'singular_name'       => _x( 'Nominee', 'Post Type Singular Name', 'themestall' ),
		'menu_name'           => __( 'Nominees', 'themestall' ),
		'parent_item_colon'   => __( 'Parent Item:', 'themestall' ),
		'all_items'           => __( 'All Items', 'themestall' ),
		'view_item'           => __( 'View Item', 'themestall' ),
		'add_new_item'        => __( 'Add New Item', 'themestall' ),
		'add_new'             => __( 'Add New', 'themestall' ),
		'edit_item'           => __( 'Edit Item', 'themestall' ),
		'update_item'         => __( 'Update Item', 'themestall' ),
		'search_items'        => __( 'Search Item', 'themestall' ),
		'not_found'           => __( 'Not found', 'themestall' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'themestall' ),
	);
	
	$rewrite = array(
		'slug'                => 'nominee',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'author'),
		'taxonomies'          => array( 'nominee_category', 'nominee_tag', 'nominee_software', 'nominee_color' ),
		'hierarchical'        => false,
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
		'query_var'           => 'nominee',
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'nominee', $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_nominee_post_type', 0 );

}

if ( ! function_exists( 'themestall_nominee_category_taxonomy' ) ) {

// Register Custom Taxonomy
function themestall_Nominee_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Site Categories', 'Taxonomy General Name', 'themestall'),
		'singular_name'              => _x( 'Site Category', 'Taxonomy Singular Name', 'themestall'),
		'menu_name'                  => __( 'Site Categories', 'themestall'),
		'all_items'                  => __( 'All Items', 'themestall'),
		'parent_item'                => __( 'Parent Item', 'themestall'),
		'parent_item_colon'          => __( 'Parent Item:', 'themestall'),
		'new_item_name'              => __( 'New Item Name', 'themestall'),
		'add_new_item'               => __( 'Add New Item', 'themestall'),
		'edit_item'                  => __( 'Edit Item', 'themestall'),
		'update_item'                => __( 'Update Item', 'themestall'),
		'separate_items_with_commas' => __( 'Separate items with commas', 'themestall'),
		'search_items'               => __( 'Search Items', 'themestall'),
		'add_or_remove_items'        => __( 'Add or remove items', 'themestall'),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'themestall'),
		'not_found'                  => __( 'Not Found', 'themestall'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'nominee_category', array( 'nominee' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_nominee_category_taxonomy', 0 );

}

if ( ! function_exists( 'themestall_nominee_tag_taxonomy' ) ) {

// Register Custom Taxonomy
function themestall_nominee_tag_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Site Tags', 'Taxonomy General Name', 'themestall'),
		'singular_name'              => _x( 'Site Tag', 'Taxonomy Singular Name', 'themestall'),
		'menu_name'                  => __( 'Site Tags', 'themestall'),
		'all_items'                  => __( 'All Items', 'themestall'),
		'parent_item'                => __( 'Parent Item', 'themestall'),
		'parent_item_colon'          => __( 'Parent Item:', 'themestall'),
		'new_item_name'              => __( 'New Item Name', 'themestall'),
		'add_new_item'               => __( 'Add New Item', 'themestall'),
		'edit_item'                  => __( 'Edit Item', 'themestall'),
		'update_item'                => __( 'Update Item', 'themestall'),
		'separate_items_with_commas' => __( 'Separate items with commas', 'themestall'),
		'search_items'               => __( 'Search Items', 'themestall'),
		'add_or_remove_items'        => __( 'Add or remove items', 'themestall'),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'themestall'),
		'not_found'                  => __( 'Not Found', 'themestall'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'nominee_tag', array( 'nominee' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_nominee_tag_taxonomy', 0 );

}

if ( ! function_exists( 'themestall_nominee_software_taxonomy' ) ) {

// Register Custom Taxonomy
function themestall_nominee_software_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Site Softwares', 'Taxonomy General Name', 'themestall'),
		'singular_name'              => _x( 'Site Software', 'Taxonomy Singular Name', 'themestall'),
		'menu_name'                  => __( 'Site Softwares', 'themestall'),
		'all_items'                  => __( 'All Items', 'themestall'),
		'parent_item'                => __( 'Parent Item', 'themestall'),
		'parent_item_colon'          => __( 'Parent Item:', 'themestall'),
		'new_item_name'              => __( 'New Item Name', 'themestall'),
		'add_new_item'               => __( 'Add New Item', 'themestall'),
		'edit_item'                  => __( 'Edit Item', 'themestall'),
		'update_item'                => __( 'Update Item', 'themestall'),
		'separate_items_with_commas' => __( 'Separate items with commas', 'themestall'),
		'search_items'               => __( 'Search Items', 'themestall'),
		'add_or_remove_items'        => __( 'Add or remove items', 'themestall'),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'themestall'),
		'not_found'                  => __( 'Not Found', 'themestall'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'nominee_software', array( 'nominee' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_nominee_software_taxonomy', 0 );

}

if ( ! function_exists( 'themestall_nominee_color_taxonomy' ) ) {

// Register Custom Taxonomy
function themestall_nominee_color_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Site Colors', 'Taxonomy General Name', 'themestall'),
		'singular_name'              => _x( 'Site Color', 'Taxonomy Singular Name', 'themestall'),
		'menu_name'                  => __( 'Site Colors', 'themestall'),
		'all_items'                  => __( 'All Items', 'themestall'),
		'parent_item'                => __( 'Parent Item', 'themestall'),
		'parent_item_colon'          => __( 'Parent Item:', 'themestall'),
		'new_item_name'              => __( 'New Item Name', 'themestall'),
		'add_new_item'               => __( 'Add New Item', 'themestall'),
		'edit_item'                  => __( 'Edit Item', 'themestall'),
		'update_item'                => __( 'Update Item', 'themestall'),
		'separate_items_with_commas' => __( 'Separate items with commas', 'themestall'),
		'search_items'               => __( 'Search Items', 'themestall'),
		'add_or_remove_items'        => __( 'Add or remove items', 'themestall'),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'themestall'),
		'not_found'                  => __( 'Not Found', 'themestall'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'nominee_color', array( 'nominee' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'themestall_nominee_color_taxonomy', 0 );

}

require_once 'meta-boxes.php';

/** Add Colorpicker Field to "Add New Category" Form **/
function nominee_color_form_custom_field_add( $taxonomy ) {
?>
<div class="form-field">
    <label for="nominee_color_custom_color"><?php echo esc_html__('Color', 'themestall'); ?></label>
    <input name="nominee_color_meta[catBG]" class="colorpicker" type="text" value="" />
    <p class="description"><?php echo esc_html__('Pick a Site Color', 'themestall'); ?></p>
</div>
<?php
}
add_action('nominee_color_add_form_fields', 'nominee_color_form_custom_field_add', 10 );

/** Add New Field To Category **/
function nominee_color_extra_category_fields( $tag ) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "taxonomy_term_$t_id" );
?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php esc_html_e('Color Name'); ?></label></th>
    <td>
        <div id="colorpicker">
            <input type="text" name="nominee_color_meta[catBG]" class="colorpicker" size="3" style="width:20%;" value="<?php echo (isset($cat_meta['catBG'])) ? $cat_meta['catBG'] : '#fff'; ?>" />
        </div>
            <br />
        <span class="description"><?php esc_html_e('Background color of Site Color', 'themestall'); ?></span>
            <br />
        </td>
</tr>
<?php
}
add_action('nominee_color_edit_form_fields','nominee_color_extra_category_fields');

/** Save Category Meta **/
function nominee_color_save_extra_category_fileds( $term_id ) {

    if ( isset( $_POST['nominee_color_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "taxonomy_term_$t_id");
        $cat_keys = array_keys($_POST['nominee_color_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['nominee_color_meta'][$key])){
                $cat_meta[$key] = $_POST['nominee_color_meta'][$key];
            }
        }
        //save the option array
        update_option( "taxonomy_term_$t_id", $cat_meta );
    }
}
add_action ('edited_nominee_color', 'nominee_color_save_extra_category_fileds');
add_action('created_nominee_color', 'nominee_color_save_extra_category_fileds', 11, 1);


/** Enqueue Color Picker **/
function colorpicker_enqueue() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'colorpicker-js', get_stylesheet_directory_uri() . '/scripts/colorpicker.js', array( 'wp-color-picker' ) );
}
add_action('admin_enqueue_scripts', 'colorpicker_enqueue' );

?>