<?php
define( 'WP_CACHE', true );



//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings



/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'landing' );

/** Database username */
define( 'DB_USER', 'landing' );

/** Database password */
define( 'DB_PASSWORD', '9R_e9z5(fynoFn52PD8r' );

/** Database hostname */
define( 'DB_HOST', 'feelme-landing-dev.ci6oqqyoiy0a.us-east-1.rds.amazonaws.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_HOME', 'https://ecslandingdev.feelme.com' );
//
define( 'WP_SITEURL', 'https://ecslandingdev.feelme.com' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6N{JY!BUw2M)S>6.D13RU-jOF[_O|FNH=je(Tt>OK%i;==ClKRilX9S<tyd|0GdT' );
define( 'SECURE_AUTH_KEY',  'S?7yw0;!@>8A*D$MBUbOwiS) H`WaNQ4MndSwj2Og%;v>82<DSS1>]9@#W+D=ARc' );
define( 'LOGGED_IN_KEY',    ']T{HRN$]Gh~QmCF-)U7u6 ?SjbF?29TbmE#R&z3f}b/5{Yfj8:k)|~k$MUdj7R M' );
define( 'NONCE_KEY',        ']/@)mK{a@I7l*Zrgbv[%Y|<=HKhOv]cDq:zhORN^7-Z-^pu$mx%`>=QI/4E]`Zct' );
define( 'AUTH_SALT',        '<_:9!!]oj? )n@I*Z{(j{|9FGh:P+P#g}tM jQF4qxovkR$[F--0IKUfoE10@UsR' );
define( 'SECURE_AUTH_SALT', 'Js?j*tG%LB/jIa1:~~OHOv).642U#TvuNqlXn9+F9slckXz[S!ySfUM~T?yf@@`b' );
define( 'LOGGED_IN_SALT',   'otAld4 <J]lNLUz(Y%}`i(h}3G83KI*<bG%GA/QMvXy# dH3iE3t4/MR]O,Gj3ZW' );
define( 'NONCE_SALT',       'Y,oge,35^GYN)1jz<ZkP$)V@yG@,gAdD-kOKNkwpZ&Ylt14C]iPO1V+}Z|Yv}9$$' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fm_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_MEMORY_LIMIT', '2048' );


/* Add any custom values between this line and the "stop editing" line. */

define('DISABLE_WP_CRON', true) ;

/* That's all, stop editing! Happy publishing. */

/* Multisite */
// define( 'WP_ALLOW_MULTISITE', true );


define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
define( 'DOMAIN_CURRENT_SITE', 'ecslandingdev.feelme.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
$_SERVER['HTTPS']='on';


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
