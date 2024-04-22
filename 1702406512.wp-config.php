<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

if ( file_exists( dirname( __FILE__ ) . '/gd-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/gd-config.php' );
	define( 'FS_METHOD', 'direct' );
	define( 'FS_CHMOD_DIR', ( 0705 & ~ umask() ) );
	define( 'FS_CHMOD_FILE', ( 0604 & ~ umask() ) );
}

if(isset($_SERVER['HTTP_X_SUCURI_CLIENTIP']))
{
    $_SERVER["REMOTE_ADDR"] = $_SERVER['HTTP_X_SUCURI_CLIENTIP'];
}

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', "absf43180186789");

/** MySQL database username */
define('DB_USER', "absf43180186789");

/** MySQL database password */
define('DB_PASSWORD', "toV)-0Rvu0");

/** MySQL hostname */
define('DB_HOST', '198.71.240.76:3310');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EIKHZf=Q1mAf#SNXGrJa');
define('SECURE_AUTH_KEY',  'wf7F&Mv(=qLEJq1AImh$');
define('LOGGED_IN_KEY',    '7+U(OJqb9yUN_*jpY9pI');
define('NONCE_KEY',        '#NWWtPVv1K1wsAEpEQ-f');
define('AUTH_SALT',        'JtqEVQnaR/$jN c_dz+z');
define('SECURE_AUTH_SALT', '&%vhDV1b@r2E8$+w#HIj');
define('LOGGED_IN_SALT',   '-YEcVfmF$*RK=!KcFf-Z');
define('NONCE_SALT',       '#D(M5n$$w19 W0t81a9n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = "wp_";
//define( 'FORCE_SSL_LOGIN', 1 );
//define( 'FORCE_SSL_ADMIN', 1 );

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'MWP_OBJECT_CACHE_DISABLED', true);
define('WP_DEBUG', false);
//define( 'WP_CACHE', true );






define( 'FORCE_SSL_ADMIN', true );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
