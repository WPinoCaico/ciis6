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
define('DB_NAME', 'bd_admision');

/** Nombre de usuario de la base de datos de MySQL */
define('DB_USER', 'admision');

/** Contraseña del usuario de la base de datos de MySQL */
define('DB_PASSWORD', '@dmision__2023BD');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bj6#Cy[eL5$F4G;E Htk`wp6.]^u0g^,(]Og!B%utu!z!&WE,HUf)st3i4EfI7k*');
define('SECURE_AUTH_KEY',  '@l6(GAbr`b>;>8[DOp+]sTI0I%64r7hit8Xaum7<{o9YkkEB*5l{PLyoFLU{GzjJ');
define('LOGGED_IN_KEY',    '7y:QMT#Yv5-YH3,/R:gw#{XWHHWh+.WJ.~+At3a0(sW<t5UlY`3p:_V3A)EaV|d&');
define('NONCE_KEY',        'vgG1LlT,ZktpJ,c72j~5sqrsNm86d%WC7BaPi#T;o[0e=8nd4Wd>HmVbZ0-L~jnI');
define('AUTH_SALT',        'ar1=4&Ru(a@q:aUN>S3wNqEoYl}^Aisdq&Orkb%l~FVVPSsmk|f?s ,,]#jKZT J');
define('SECURE_AUTH_SALT', '5u.D6v`3KiF4@hJi]v^M#J7y4pyYA:^ipjut!%cKmK!tb}I/0NTY]viBT`VU3W[h');
define('LOGGED_IN_SALT',   'wOrw{$ep=_irtnW2XF%woc$K+GCB?Km@t>?13X-H$/X{c>>&D_Ebg{=u,b^,k-eS');
define('NONCE_SALT',       'C~h!<iV$m1v_c)])LlA5&xH}bCroZa0-Zi,_[<7~Mbhdb^=wFx0^A[,#AYXu$PrU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ZDOgPklh_';

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
define('WP_DEBUG', false);

define( 'DISALLOW_FILE_EDIT', true );
define( 'CONCATENATE_SCRIPTS', false );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
