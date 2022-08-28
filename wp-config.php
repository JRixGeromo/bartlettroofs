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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bartlettroofs' );

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
define( 'AUTH_KEY',         '&P^n2*N9$@^N$IG:N}LJ)I9B(^Bs+zF&qYLWe,PJ!g_,BF81$,vz5Ix0 aeU{NUB' );
define( 'SECURE_AUTH_KEY',  'pIx5=(E;Z`l?#z*6clf:3ywL,m>@h-v3[QhEwQy}oP+ GWn%u:Y6(L%1W6s W.aj' );
define( 'LOGGED_IN_KEY',    'n5tmxMIo3y jB3Z/+S(eZA4W9+I*)~TTxN{FLp/}F]N Uy7pKCakBNK=D:<t|b@Y' );
define( 'NONCE_KEY',        'u*Mwyz:UPfKJ,pfAWt6|]!MM><BXg&)yN%ss`_[+*@9x-{BZ:<6zZ)hgFgTb;oXa' );
define( 'AUTH_SALT',        '?.MQx.u`w}1-e?(`9< Y25! 7B3[bo(g]ntv&CWStMmj~`*Mrg<Sv..5@FAYpUVj' );
define( 'SECURE_AUTH_SALT', '>.!<puA2]52BePyWznz,.nJQiY_Zr%q}3y]g~U`[n(tV)2d1Y~Sq{xA].Cwg3xhM' );
define( 'LOGGED_IN_SALT',   '`EmjMs.?V9~zAZqcLCaqtEw9M~|`bk4%#J0gy-xSOjgeg`wa%6uifUpT7G?gIJ2n' );
define( 'NONCE_SALT',       ':3Ap^=M@^T/3-6PYr=//[m JNFW`|#cI2p2# T8IfjZ>Y.q2#%{a9Snd4wZR..-~' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
