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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'labb2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'xo(8c?IDZ7oyQt.DlT0$8&URMX(GvX >K|V5~#KPh<+=:Q)=>K-W88{}3Tm|T;SY' );
define( 'SECURE_AUTH_KEY',  '}hG+jf7 ule=N_a/&it;n*Q=2C|8gJ ]p17&o7JUs{uIml!h1@KItCzmm}}mx(2V' );
define( 'LOGGED_IN_KEY',    '2O%Dc8Hn0DOh2H2?[TLB0XgyR^5tX7CIX[I(*Sda56f !Q }FL|6~SRMsHR,)8]9' );
define( 'NONCE_KEY',        '|w>]CD*O&N<crK68y-kpe}Ob!Z?#j]zO4?f2MO+mRn+WFXxr(mi~GgP-[VIvf# R' );
define( 'AUTH_SALT',        's|eeEyH<x]MUWun,fK*6lhsZ$p(1/C+>8`Unxzi4{*|pC}W%Y/1Pp(0&|)$;PfWQ' );
define( 'SECURE_AUTH_SALT', '!gK%*hHmA<#@yhoi2}J3IoBI`@@AN5`I6Xp2W @lIb#:TZ_eO4@o}5.LEligJOH}' );
define( 'LOGGED_IN_SALT',   '7xhB-TKR&,daDx:!sfA^zNLAR~1BL5alEKMbYs1Y@Hy]@FKZ,vmdz9J{zie)UdU7' );
define( 'NONCE_SALT',       'fV2Yd#tXvkE[DtL9Le>]cWyZT/]|k88:[HT:}WqdGw)1~| # {2FGAPc#+XD%AJ?' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
