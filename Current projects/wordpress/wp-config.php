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
define('DB_NAME', 'Wordpress_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '$~`;B{a>Q&7n%,6.o7s`nrY{nybpPmNEJQ?hPz2 U=8PXy6%/+7/!d} c}K/i8t6');
define('SECURE_AUTH_KEY',  'cG?}r!rq1yH*2}N{Sh+f4x}5.swP#`u7Sar3!`6RfQ7BOje*SDE{]]jC>16MwD$G');
define('LOGGED_IN_KEY',    '%tRm8Lt]pVQs$|a3`7 pj9iPXdH&Nx2EQ5Inx*fCM=|Vr)O;(sB[AlR}q{6On9F5');
define('NONCE_KEY',        'JvlCwO:IMQqHE>5v!CC,AWgsF2En-J[/iG>NYHComF]UiR^mWf;?jWZ78A+I>Z}E');
define('AUTH_SALT',        '2.@Rg0,|Fp?T,zTdi_Jf(4S]J=^5HV~^/NW<VaX/CP+OO~8C~;#tJS @7p%ChWMY');
define('SECURE_AUTH_SALT', ' aqP0i|db,9Up|+v8_w*%!5zC61m$o4wab$P!6>4yWcC_+JzQ@M,f?:zw2E+ ?o4');
define('LOGGED_IN_SALT',   '==hq%Jn {HFpP%67W+&gSrqN ;YaBmW-NJRE)%a#AY+Ymr}Fc#;mVMFK%xwtLU|D');
define('NONCE_SALT',       'c2?3g@PCArUC:ValTNS|T7jmW4_Y^DrAgUg,iylOowbJOY8)N$$1SVWUhmV,G?uM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
