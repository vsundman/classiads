<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'classiads');

/** MySQL database username */
define('DB_USER', 'classiads_user');

/** MySQL database password */
define('DB_PASSWORD', 'd69hrfvnRPsnZV4J');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '7!={4fI?lTjsoOe*-P`Ud!@{^s16|;/%|s^MGHWh)!hnhKm&bjO$;a?]M]~wkYuE');
define('SECURE_AUTH_KEY',  '0b)`z3p/HlIg4L%^6F*>RivHe1DqsV|Y$-HED-T_RJ)=-;ZoB+VbTGr~wtBX:P`i');
define('LOGGED_IN_KEY',    '@4l{?sXxp!j>fv|<1X.OsU|%WU0nmx#Q6t#KRmV-&h2-~^R~763y_MU{G~o!|^i5');
define('NONCE_KEY',        '^PXfvVfcXjtdhNO~-}fb;BbaN9b$AOj&nYSKOg+oTt!H}n=~g9qZ1laz0-d20,1c');
define('AUTH_SALT',        'bM9-CH(6S|5|WC*%*ELuCY^ZH_&SQNr`ID|ST9pxRpe,NQ<_kE,Eaj@{J7<wbD5n');
define('SECURE_AUTH_SALT', 'dk2+y}x6F-V;9TxkyP_Vd<S,F-svY77OJ8khR+|br~3w{8z<UYM~rWqWA5udV;fL');
define('LOGGED_IN_SALT',   'YK@QM# G{;IQ6&HJYi.Vrr+W+D!L|j~nNP/2tYDg9/mQ(^Xac-M2e`M&|hzn6Nr1');
define('NONCE_SALT',       '-quFJ3{IfJp++GJn!KhslflFi3 Z;r!/xRHk#m_KVD3Yf3C)w%|35k.>[};Qz:AK');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'class_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
