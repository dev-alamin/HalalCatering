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
define( 'DB_NAME', 'halal_catering' );

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
define( 'AUTH_KEY',         'Be`.t5e2smP uPP4es*3Vujf$mmyL8woD;TQp(E_cZ;8I(A! Sr173]a,v0TG3U(' );
define( 'SECURE_AUTH_KEY',  'w-dLe*l?]dk|)SbM[XXl.pOL1wB7RYjsC$H`I[4cLA9x2n9mwdmYu94ko+p #H7]' );
define( 'LOGGED_IN_KEY',    '#K0)z2)8ljQoLC~uWtP=04JAH!jxjJP7)Q_ydZw0|fEB$Asu$r%uDCPlRxaxcMP*' );
define( 'NONCE_KEY',        'k_B/s!b[FH7M=C&in?6#[Z0ql8l_Vbu|/pqkj0/sEI*r5VVZLbQ|8>K~Capp45sk' );
define( 'AUTH_SALT',        'j>jRa*6It mwB|]3$2L2$U3[pL$elNdZ.;Q2>oedN!oogf WgZe_58}mBI^PWiy/' );
define( 'SECURE_AUTH_SALT', 'PD(pZgE#[oulX3s+WjG]$/?T[V^k7Ah412)CN?ncI/lR1O-AV78&U0Z.4tPHn35c' );
define( 'LOGGED_IN_SALT',   'ovQW!b~EwyIx$qVNJ*#zc^F~ri&|fx-@H@hiZvVpKJ,Q@v^534xt<D1{8Q6y|w_6' );
define( 'NONCE_SALT',       '5!nj<9AYqVv{A?pXt[DxK.;qQ(qjS 0[$a{,Be*plTY%NVr+a!}P~>Zt)7Rgiv)]' );

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
