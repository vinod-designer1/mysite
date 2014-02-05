<?php
/**se configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rehman');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '9440336828');

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
define('AUTH_KEY',         '|$:.n^XF<60-W[a`e%SBT+6R&sM+h-pQRA<oV#7GAfjXru3S>~DsL^DusU_?-cX<');
define('SECURE_AUTH_KEY',  '6-)WDw6@JOg2Y|,a[]:mM(hxMR*`Xs*Vct_DUqCR/zPY2g,cu`KzCdNgkKoatbU%');
define('LOGGED_IN_KEY',    'X-.zl%!JdhTf-p?C^$8xD|vM*-.!DgBh9C:[3^XM8-15?3S_{=S3O**0Apf&:y,2');
define('NONCE_KEY',        'CTajzbvGLDA,?ZtR_OGY6oeYZl%-5KXEOdp#+hIl1gLFyrnp0n2+ CcS{oNx$DFk');
define('AUTH_SALT',        '-CqzJFHh?:Nh*dE~)+zU3U8R[1+KlO#>AD{X=yac^t9|H@q$|bn[|p,yk!2CDs=L');
define('SECURE_AUTH_SALT', 'IRPfI_fwy|>N(K&D.+<7>Qux5gGQfS <R)Of0%M6xOZ[>GJWnbd^+Vz]pO-@g);O');
define('LOGGED_IN_SALT',   'm9[(:<GM&s<Z: >;k$O9|?{>U.Ylp|6+csp|U-[K<gGB{gpqv|~Nr]_]YmhS7KqW');
define('NONCE_SALT',       ';ee3?}lV.`[`~@hj+iR,6),+[|59#oQ#{&H?zn-kDD%TV(iep}lW/VR@|0I4_cEm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

