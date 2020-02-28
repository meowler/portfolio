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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5jSehhgN0vksWEayl/jV+bV7UV4LvYOWMDEKer40NVV1mJK8kawvgmMobeMIxNFgTWqhb+71sS4ewN4YCwdWOw==');
define('SECURE_AUTH_KEY',  '4v/OCmfKjBVZDdMhdM5INco4Uqji18WSexaWvTFadxzvAmbGbcygoZOzwX3GeTDJDxOsdSfbhO+80ev00MthoQ==');
define('LOGGED_IN_KEY',    'UjHl6UifgbQ9guQ8kkbmFAiRORM6XFGyuKHxkuLQHDVfS8Zb+pY+Jqj9VbuiLxyZDvlgAbXIjQjcIlP6D6cCSA==');
define('NONCE_KEY',        '2PzoMI+E+LrU18D+by2MiPKCWdeAYepd6tE0T33XAjGFM78FdkhPZrcbfSj4B+A4qDxFzPsH1KiSiho9ubpMlw==');
define('AUTH_SALT',        'eGTt94Kzq5nerNywu/WXMls0VOAGegTm//t6hLcaJKvGFoOUu1CVpeU9tS+p3F9lpecTUoAbkuCj9+tg74gtgg==');
define('SECURE_AUTH_SALT', 'vjutwAByJXWwdz/mBOiJBVnWJSQVkO+zvNv75EcLNtrPBO5T4Yf7DZZjOecdukWsRtL49N/cL4WnrodXZEmlfw==');
define('LOGGED_IN_SALT',   'UtRcp14FNxh7sNTvLnErVcflLKvF6+ZBn0xItRSGSEC+/zKgQIOrdYe+J+n2lTUruqeeZU6tryJDS/PJyyO5lg==');
define('NONCE_SALT',       'ZmVK2Ge+qHQZekAVyAG4ASSj6mOhqqfGl3SCtsCUAyJIQ4FGA257c684f++ClxOVo2l1QxyjaMpvI0dwP4HnBA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
