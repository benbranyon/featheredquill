<?php
class ThemeStall_Shortcodes {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'plugins_loaded',             array( __CLASS__, 'init' ) );
		add_action( 'init',                       array( __CLASS__, 'register' ) );
		add_action( 'init',                       array( __CLASS__, 'update' ), 20 );
		register_activation_hook( TS_PLUGIN_FILE, array( __CLASS__, 'activation' ) );
		register_activation_hook( TS_PLUGIN_FILE, array( __CLASS__, 'deactivation' ) );
	}

	/**
	 * Plugin init
	 */
	public static function init() {
		// Make plugin available for translation
		load_plugin_textdomain( 'themestall', false, dirname( plugin_basename( TS_PLUGIN_FILE ) ) . '/languages/' );
		// Setup admin class
		$admin = new Sunrise4( array(
				'file'       => TS_PLUGIN_FILE,
				'slug'       => 'ts',
				'prefix'     => 'ts_option_',
				'textdomain' => 'su'
			) );
		// Top-level menu
		$admin->add_menu( array(
				'page_title'  => __( 'Settings', 'themestall' ) . ' &lsaquo; ' . __( 'ThemeStall Shortcodes', 'themestall' ),
				'menu_title'  => apply_filters( 'ts/menu/shortcodes', __( 'Shortcodes', 'themestall' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'themestall',
				'icon_url'    => 'dashicons-editor-code',
				'position'    => '80.11',
				'options'     => array(
					array(
						'type' => 'opentab',
						'name' => __( 'About', 'themestall' )
					),
					array(
						'type'     => 'about',
						'callback' => array( 'Ts_Admin_Views', 'about' )
					),
					array(
						'type'    => 'closetab',
						'actions' => false
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Settings', 'themestall' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'custom-formatting',
						'name'    => __( 'Custom formatting', 'themestall' ),
						'desc'    => __( 'Disable this option if you have some problems with other plugins or content formatting', 'themestall' ) . '<br /><a href="http://gndev.info/kb/custom-formatting/" target="_blank">' . __( 'Documentation article', 'themestall' ) . '</a>',
						'default' => 'on',
						'label'   => __( 'Enabled', 'themestall' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'skip',
						'name'    => __( 'Skip default values', 'themestall' ),
						'desc'    => __( 'Enable this option and the generator will insert a shortcode without default attribute values that you have not changed. As a result, the generated code will be shorter.', 'themestall' ),
						'default' => 'on',
						'label'   => __( 'Enabled', 'themestall' )
					),
					array(
						'type'    => 'text',
						'id'      => 'prefix',
						'name'    => __( 'Shortcodes prefix', 'themestall' ),
						'desc'    => sprintf( __( 'This prefix will be added to all shortcodes by this plugin. For example, type here %s and you\'ll get shortcodes like %s and %s. Please keep in mind: this option is not affects your already inserted shortcodes and if you\'ll change this value your old shortcodes will be broken', 'themestall' ), '<code>ts_</code>', '<code>[ts_button]</code>', '<code>[ts_column]</code>' ),
						'default' => 'ts_'
					),
					array(
						'type'    => 'text',
						'id'      => 'hotkey',
						'name'    => __( 'Insert shortcode Hotkey', 'themestall' ),
						'desc'    => sprintf( '%s<br><a href="https://rawgit.com/jeresig/jquery.hotkeys/master/test-static-01.html" target="_blank">%s</a> | <a href="https://github.com/jeresig/jquery.hotkeys#notes" target="_blank">%s</a>', __( 'Here you can define custom hotkey for the Insert shortcode popup window. Leave this field empty to disable hotkey', 'themestall' ), __( 'Hotkey examples', 'themestall' ), __( 'Additional notes', 'themestall' ) ),
						'default' => 'alt+i'
					),
					array(
						'type'    => 'hidden',
						'id'      => 'skin',
						'name'    => __( 'Skin', 'themestall' ),
						'desc'    => __( 'Choose global skin for shortcodes', 'themestall' ),
						'default' => 'default'
					),
					array(
						'type' => 'closetab'
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Custom CSS', 'themestall' )
					),
					array(
						'type'     => 'custom_css',
						'id'       => 'custom-css',
						'default'  => '',
						'callback' => array( 'Ts_Admin_Views', 'custom_css' )
					),
					array(
						'type' => 'closetab'
					)
				)
			) );
		// Settings submenu
		$admin->add_submenu( array(
				'parent_slug' => 'themestall',
				'page_title'  => __( 'Settings', 'themestall' ) . ' &lsaquo; ' . __( 'ThemeStall Shortcodes', 'themestall' ),
				'menu_title'  => apply_filters( 'ts/menu/settings', __( 'Settings', 'themestall' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'themestall',
				'options'     => array()
			) );
		// Examples submenu
		$admin->add_submenu( array(
				'parent_slug' => 'themestall',
				'page_title'  => __( 'Examples', 'themestall' ) . ' &lsaquo; ' . __( 'ThemeStall Shortcodes', 'themestall' ),
				'menu_title'  => apply_filters( 'ts/menu/examples', __( 'Examples', 'themestall' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'ThemeStall-examples',
				'options'     => array(
					array(
						'type' => 'examples',
						'callback' => array( 'Ts_Admin_Views', 'examples' )
					)
				)
			) );
		// Cheatsheet submenu
		$admin->add_submenu( array(
				'parent_slug' => 'themestall',
				'page_title'  => __( 'Cheatsheet', 'themestall' ) . ' &lsaquo; ' . __( 'ThemeStall Shortcodes', 'themestall' ),
				'menu_title'  => apply_filters( 'ts/menu/examples', __( 'Cheatsheet', 'themestall' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'ThemeStall-cheatsheet',
				'options'     => array(
					array(
						'type' => 'cheatsheet',
						'callback' => array( 'Ts_Admin_Views', 'cheatsheet' )
					)
				)
			) );
		// Add-ons submenu
		$admin->add_submenu( array(
				'parent_slug' => 'themestall',
				'page_title'  => __( 'Add-ons', 'themestall' ) . ' &lsaquo; ' . __( 'ThemeStall Shortcodes', 'themestall' ),
				'menu_title'  => apply_filters( 'ts/menu/addons', __( 'Add-ons', 'themestall' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'ThemeStall-addons',
				'options'     => array(
					array(
						'type' => 'addons',
						'callback' => array( 'Ts_Admin_Views', 'addons' )
					)
				)
			) );
		// Translate plugin meta
		__( 'ThemeStall Shortcodes', 'themestall' );
		__( 'Themestall', 'themestall' );
		__( 'Supercharge your WordPress theme with mega pack of shortcodes', 'themestall' );
		// Add plugin actions links
		add_filter( 'plugin_action_links_' . plugin_basename( TS_PLUGIN_FILE ), array( __CLASS__, 'actions_links' ), -10 );
		// Add plugin meta links
		add_filter( 'plugin_row_meta', array( __CLASS__, 'meta_links' ), 10, 2 );
		// ThemeStall Shortcodes is ready
		do_action( 'ts/init' );
	}

	/**
	 * Plugin activation
	 */
	public static function activation() {
		self::timestamp();
		update_option( 'ts_option_version', TS_PLUGIN_VERSION );
		do_action( 'ts/activation' );
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
		do_action( 'ts/deactivation' );
	}

	/**
	 * Plugin update hook
	 */
	public static function update() {
		$option = get_option( 'ts_option_version' );
		if ( $option !== TS_PLUGIN_VERSION ) {
			update_option( 'ts_option_version', TS_PLUGIN_VERSION );
			do_action( 'ts/update' );
		}
	}

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Prepare compatibility mode prefix
		$prefix = ts_cmpt();
		// Loop through shortcodes
		foreach ( ( array ) Ts_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Ts_Shortcodes', $id ) ) ) $func = array( 'Ts_Shortcodes', $id );
			elseif ( is_callable( array( 'Ts_Shortcodes', 'ts_' . $id ) ) ) $func = array( 'Ts_Shortcodes', 'ts_' . $id );
			else continue;
			// Register shortcode
			add_shortcode( $prefix . $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( $prefix . 'media', array( 'Ts_Shortcodes', 'media' ) );
	}

	/**
	 * Add timestamp
	 */
	public static function timestamp() {
		if ( !get_option( 'ts_installed' ) ) update_option( 'ts_installed', time() );
	}

	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=ThemeStall-examples' ) . '">' . __( 'Examples', 'themestall' ) . '</a>';
		$links[] = '<a href="' . admin_url( 'admin.php?page=ThemeStall' ) . '#tab-0">' . __( 'Where to start?', 'themestall' ) . '</a>';
		return $links;
	}

	/**
	 * Add plugin meta links
	 */
	public static function meta_links( $links, $file ) {
		// Check plugin
		if ( $file === plugin_basename( TS_PLUGIN_FILE ) ) {
			unset( $links[2] );
			$links[] = '<a href="http://gndev.info/ThemeStall/" target="_blank">' . __( 'Project homepage', 'themestall' ) . '</a>';
			$links[] = '<a href="http://wordpress.org/support/plugin/ThemeStall/" target="_blank">' . __( 'Support forum', 'themestall' ) . '</a>';
			$links[] = '<a href="http://wordpress.org/extend/plugins/ThemeStall/changelog/" target="_blank">' . __( 'Changelog', 'themestall' ) . '</a>';
		}
		return $links;
	}
}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function ThemeStall_shortcodes() {
	return true;
}

new ThemeStall_Shortcodes;
