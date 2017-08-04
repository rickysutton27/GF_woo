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
define('DB_NAME', 'gf_woo');

/** MySQL database username */
define('DB_USER', 'gf_user');

/** MySQL database password */
define('DB_PASSWORD', 'KTyjTvpfNmRSpmSz');

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
define('AUTH_KEY',         'j`@ VTsACGZ 8<Q{O19Pcdk(L3`a:gy.=VOpm{<<Yz=oDN1BHVNPX8Ep-twGt=}E');
define('SECURE_AUTH_KEY',  'GjS )2>0ujrKO;]!OD<Ee-(k6,#J5{ZSJOtunD3wob$4Z.}l4Tu>npAW&;-c$)K*');
define('LOGGED_IN_KEY',    'X:AumrW+7-;}NS?SK<;L]i}ch$nsTs@YHx;j9/Yf79NV{DOQ%Fy~iezj}AA~*oYL');
define('NONCE_KEY',        '!-<gE7(@o`>FZUGg;yz)EjbExI,.A#yv[5o|=oq2@7T~pBc/_qKpr*aPm([#Um1+');
define('AUTH_SALT',        '4ULGY64ZMotuCgAC8WudHNg[gxH;P~&7%2R$CvQVR9hm1d,Ac:ig~doGZu01)0vR');
define('SECURE_AUTH_SALT', ' U%>3#czXpEl7(p/}{g%+T-)hi)hOIgK8Rg`t #oZwi**Mn~v`0;?r#nf=vrpFaK');
define('LOGGED_IN_SALT',   '%Q{jQ:FLR`>]10@nE=C<fDD)uuqDx.D|SwY,nuWj%@#:/RM5|KR@2H56QWzr,.]7');
define('NONCE_SALT',       'Jhh4g3R!]F2oBEO%9a5i!~*HjE+Z&4YiM*R!GrS&VCwxxg+x6 G#):?a=qyHm|Eb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gfwp_';

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
