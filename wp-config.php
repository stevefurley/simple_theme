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

 // Get the current host
 $currenthost 	= $_SERVER['HTTP_HOST'];
 $local_env  = strpos($currenthost, '.local');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if ($local_env == true):
define('DB_NAME', 'legal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

else:
  define('DB_NAME', 'scarl_stage');

  /** MySQL database username */
  define('DB_USER', 'scarl_stage');

  /** MySQL database password */
  define('DB_PASSWORD', '2PsVTkmKFN3C');

  /** MySQL hostname */
  define('DB_HOST', 'localhost');

  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8');

  /** The Database Collate type. Don't change this if in doubt. */
  define('DB_COLLATE', '');
endif;
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         '&kJZ:|04=%ep@&km+)TR74Y@`+C/P0+t[h8:(A/XAK!I`y^*[1+r?<JP~}gKP Sn');
 define('SECURE_AUTH_KEY',  '~nm%gm+ap$b_6&TC^+(^jh?xrI[hPhbzJKt^|5E4EV s+C`T.yn(g$+$&OLf_Ugj');
 define('LOGGED_IN_KEY',    'Cd:`/`9QL:VIR.mbB7#57vu@n/-MmlS&65b{k4Fd]3MYMhoAl]AD-ktf<^v~-i:5');
 define('NONCE_KEY',        '5MyC-|ru1f/+ZLUH`&Ge%[_GMbPtRaN$lEyYVg2&Bf?GY|fP{irP+<{8:#0vjWVh');
 define('AUTH_SALT',        'p:^;ymo+qK<0v,)a|#;YC?wB4X{#L}H*|:g$e.@Y-3`0E5C@WR<sZ#*v6>wso?p.');
 define('SECURE_AUTH_SALT', 'NZB2%G_5Y|5OXF+~rf{M_~&-0X-36(5PRU|^)a}4+ypXvWvFSLjMPAhGX*K{[p0/');
 define('LOGGED_IN_SALT',   'E;j69H^{<+Y2-Pc)u4pwb+Ez_]w[weI|_$Ds]9`Uq;A(Le>q}Zd~wM<06+ i4-~w');
 define('NONCE_SALT',       '|$^}oh9,|3!T>G!]|(/Wy2^r44Y@ Q`5^`JImU-lqdS7<3Qy*+^X 1Srec?l6%w|');
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
