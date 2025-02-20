<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'everta' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'i CO-;r;-VUF9z|.A>&9<O#a<6`m%Dr kGreqI1!t#!EIqP2Cz@b&,{aX.8Rm7|,' );
define( 'SECURE_AUTH_KEY',  '7V*{v(M+f#6TNCwCbd},Kta3J)*q1(I{w?E#g8o+-~nv[`BJ)Cz.>K9;3B4-7Ab.' );
define( 'LOGGED_IN_KEY',    'QH*L6y{|IM3LOBW,Uax%?Ron[3~`z,qqK-m4azN|)c!=shHfW|p+=D$79>ZpyQoR' );
define( 'NONCE_KEY',        '2P~nl`u;%F|$c_sv/.)$~ss _H<+104?*m73q=hW3bkj^8zCDoqgl7a;XLy3S<o9' );
define( 'AUTH_SALT',        '!)oBXzcjDz(&I`!|}!nS=?t*;*]Ud-Fk,/HQ!V+[QsR=/s65rcw>18TLF,B{Qz!w' );
define( 'SECURE_AUTH_SALT', '<}^@v6^k$R8?zZ^)|mm_sS;6yJz^im<|8l7.[?k6AJ_opm-p^FHCnE6Jc2R+eTij' );
define( 'LOGGED_IN_SALT',   'PWjG0nc1v!I=>_Ag ]xc_eU*>{.xdJd6?I`-Y_(1]evUy X!h-E%B8G&ry(q8H~_' );
define( 'NONCE_SALT',       'EUB1B482)z-:x~yLeU4I``*YlSAa7u-AuPx*Q}51Y.?;$,^jPv1{XEdKRlIZ2NuX' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
