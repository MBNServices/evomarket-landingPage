<?php
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'zYxCvO@AFeU!WI(,imx^?+sm#.NBs0nyU]r}ql]>yFy k{tlz>J| E|c1H@BsDz_' );
define( 'SECURE_AUTH_KEY',   'v$Fx`T#sg@TEj:/NS#2*zaZ0W,pI=/Ea*C,e SKOmmo3qaW9BHbJsh&ddBz{|9k#' );
define( 'LOGGED_IN_KEY',     'fHjx9CXHQlWo;A5Y}xK+?rP+n *OYtqQUanOQXxILr|~X2Z3H] ~! I=<r8ZWj-j' );
define( 'NONCE_KEY',         ',|lc9je(e=:Df%t0%&Jq2JAo(AJ&k2GvLeA+*1l&DBi2+g#YB.x 2Q9mG6z+va,_' );
define( 'AUTH_SALT',         'v8,8F-qn[<unz0)&m;GP{CzryrWpty-!S0FN_*T{&dmBJ%!IyaC=G5G*h#/OBJ~&' );
define( 'SECURE_AUTH_SALT',  'i-cv?#O{T>p_,3Cu]S-Ms6-ID+<o%R`hv;C]2aR@N[]lYFcb0ilaxJJHAkrzSoe$' );
define( 'LOGGED_IN_SALT',    'lf[D%N#;3;b@l+O9DV_dY:PX@vkOT{tjq$Gi}$LNo~3S!nUBh6kuD5P/GIf&%eG!' );
define( 'NONCE_SALT',        'qo^h-;M]a8!VPcG-VBOizO4D$ 0^e}sq2jDb4SUT.:+.k=-a Rku_aCkYDrU:NS]' );
define( 'WP_CACHE_KEY_SALT', ')+^OD!Ysrl^@;<2?]poAxeJPkC:u?OSOC^@Pf)T:dThvc?L82N@i!R4U-5=#;~ 0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
