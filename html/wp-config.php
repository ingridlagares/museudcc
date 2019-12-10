<?php
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
define( 'DB_NAME', 'museudb');

/** MySQL database username */
define( 'DB_USER', 'museuuser');

/** MySQL database password */
define( 'DB_PASSWORD', 'museupass');

/** MySQL hostname */
define( 'DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1dc00c3fae5a71d9fb9c1f8ade7d5378edb5717f');
define( 'SECURE_AUTH_KEY',  'fa9caa6cb9cbdafd3f702fdfe4d11c2c3aa1d38a');
define( 'LOGGED_IN_KEY',    'c5f6cc4f94af06d3763c9b781d7eb050966bc772');
define( 'NONCE_KEY',        '3b1a29a4243aa39e8519e77d6b2a9468e5ba40bb');
define( 'AUTH_SALT',        '9cc704d9e5efa7d8e9b61ed023fa0f1a16f52d58');
define( 'SECURE_AUTH_SALT', '8b447ed0beeb651b0ea3f72f7bd1abf330b87688');
define( 'LOGGED_IN_SALT',   '15f69dde9f67a8f41626c76623a0d3584e073ad7');
define( 'NONCE_SALT',       '9389c30f8b1673d47c593eac90ae7992aa369661');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
