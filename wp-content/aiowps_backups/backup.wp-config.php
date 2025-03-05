<?php
define( 'WP_CACHE', true ); // Added by WP Rocket
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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '36370ae053671c4c65289761a22735fef5c18def385122e37fdb176249936f46' );


/** Database hostname */

define( 'DB_HOST', '127.0.0.1:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


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

define( 'AUTH_KEY',         'Zr.<6d59Unpcbd*hZZljLn3/fxd9Qz?~~ Ttg,T~g0q{,h VHf#ZW)kaL0hxXN4,' );

define( 'SECURE_AUTH_KEY',  'D}8rBmyK3qwo.jFV2-c6}F}e&R?snMP{S0z zrd=K76z=e=$w5/.KIi*Ci&F>x[' );

define( 'LOGGED_IN_KEY',    '^>~mf1xO}+RPu1^uAo0rlNWr8^=8,1#z>r:A#xE;4ePOtf%]4aWd_l}rQ.Yl>K4[' );

define( 'NONCE_KEY',        '[2fRZOHF>D>gh,Ed/_wFhy u-`7LLe`4}YnV`OC].?4rw.x8GQ{xD[B9OV5ojf!y' );

define( 'AUTH_SALT',        'XjDEA!pf6r);7ybRs*gU)k[97pcT:{FgiB+;{tT|wV?R>jdgZ]<){*<PCbrrDQo)' );

define( 'SECURE_AUTH_SALT', 'v>?kc#XJacU.I(ag.pwNjaGz-!f6tR}f&T@RANb?ii415DI3.6Mb]{L0~+y./>PY' );

define( 'LOGGED_IN_SALT',   'R^EbNtOQo&mSJQJiJXnMoQQ*IgC.neZUkyDN-)MlR,8t-Sj(S;aTYRHkp&G-,h@6' );

define( 'NONCE_SALT',       '7c~id0C%u`w9lPa7`>;xr<D7,cC<sN1oM`TmtcKl<]y/ZZ0j._N?IG9[O|M9$b!z' );


/**#@-*/


/**

 * WordPress database table prefix.

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

 * visit the documentation.

 *

 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'https://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
