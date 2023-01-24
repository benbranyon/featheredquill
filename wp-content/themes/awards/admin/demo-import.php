<?php
function awards_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__('Default', 'awards'),
            'categories'                 => array('default'),
            'import_file_url'            => 'http://theme-stall.com//awards/demo-content/demo-content.xml',
            'import_widget_file_url'     => 'http://theme-stall.com//awards/demo-content/widgets.wie',
            'import_preview_image_url'   => 'http://theme-stall.com//awards/demo-content/demo_01.png',
            'import_notice'              => esc_html__( 'Please wait, it may take 5-10 minutes.', 'awards' ),
            'preview_url'                => 'http://theme-stall.com/awards/demos/',
        ),
        array(
            'import_file_name'           => esc_html__('Dark', 'awards'),
            'categories'                 => array('dark' ),
            'import_file_url'            => 'http://theme-stall.com//awards/demo-content/demo-content2.xml',
            'import_widget_file_url'     => 'http://theme-stall.com//awards/demo-content/widgets_2.wie',
            'import_preview_image_url'   => 'http://theme-stall.com//awards/demo-content/demo_02.png',
            'import_notice'              => esc_html__( 'Please wait, it may take 5-10 minutes.', 'awards' ),
            'preview_url'                => 'http://theme-stall.com/awards/demos/dark/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'awards_import_files' );

function awards_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $side_menu = get_term_by( 'name', 'Side Menu', 'nav_menu' );	

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'side-menu' => $side_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    
    if( get_page_by_title( 'Home Dark' ) != '' ){
        $front_page_id = get_page_by_title( 'Home Dark' );
        if ( function_exists( 'ot_settings_id' ) ){
            $my_options  = get_option('option_tree');
            $my_options['background_layout_style'] = 'dark';
            update_option('option_tree', $my_options);
        }
        
    } else {
        $front_page_id = get_page_by_title( 'Home Default' );
    }

    if ( function_exists( 'ot_settings_id' ) ){
        $my_options  = get_option('option_tree');
        $submit_page_id  = get_page_by_title( 'Submit a Site' );
        $my_account_page = get_option( 'woocommerce_myaccount_page_id' );
        $my_options['header_login_page'] = $my_account_page;
        $my_options['header_submit_site_page'] = $submit_page_id->ID;
        update_option('option_tree', $my_options);
    }

    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'awards_after_import_setup' );