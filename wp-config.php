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
define( 'DB_NAME', 'restaurant' );

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
define( 'AUTH_KEY',         'C+efoT|%!.cYz)#0D_(|Y}9g7+a_eYrterMRC!tOE^`{0>)Ev([o2=_X{XLQ<h|8' );
define( 'SECURE_AUTH_KEY',  'kEB:X:R4CkxvZ5xY*`6C<}ybPH5G1OAb7J-=7|],RWX8vX1&#bZhZ/IX/MtfTuTa' );
define( 'LOGGED_IN_KEY',    '$~Gl19Q9B;}iMH;kg!4)G$ oMAsl(ZmtG-D-*=OKm-/ch`,rzGljF<qd?Okp!d<4' );
define( 'NONCE_KEY',        '@$7YsJK1}l`km)})+PpP,jQlU)TqNN_&xC$jz )$vH3z>Y#H}m}7W>/|0<o^f1@v' );
define( 'AUTH_SALT',        'g0tdEl9Th=[b&9vrFD<$4T]kD`0kP!4/SnmW{_uv#@%l)OB^fBmjh`g_s -p@G|i' );
define( 'SECURE_AUTH_SALT', 'z22D2_HT7k^T*b;fd<c9g.o_L)S/)CE%(~TZkKGMfw*k.1gzcU4BgHc7a3vQ>|8@' );
define( 'LOGGED_IN_SALT',   'l`z1`a):g)BH*2$6 lp}O[R`#7X+^^o?N1?8&#K7|q)Ru]h,|!zLQdG`.%d=]FN#' );
define( 'NONCE_SALT',       '@/?%;l^p_Wg[u?HlSnHIVCZ_bhSAL:8m5.~@MmA_MSCGJk!U*D)M<;!@{{lk%wDJ' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
