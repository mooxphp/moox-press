<?php

use Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

define('DB_NAME', $_ENV['DB_DATABASE']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('WP_SITEURL', $_ENV['APP_URL'].$_ENV['WP_SLUG']);
define('WP_HOME', $_ENV['APP_URL'].$_ENV['WP_SLUG']);

define('AUTH_KEY', '^a1KZcj]@K o)qGe&WRFaPzC*7^o&+P{Zc:.T{1b^>lM[`7hy:]E5G)w*(z.z^U.');
define('SECURE_AUTH_KEY', '@jJ6x98 )r,;E)N82%<iy-JJ0!9h7Fj1zoVQi]uZvDqSh!k8,CV=?(HdoDZ</v*6');
define('LOGGED_IN_KEY', 't#I^q3&j~D7N7uUHq7|`PPUs#CALNxX]zNE:aVm97[4aVZ(!g#!<H?r@:XL?Y:*O');
define('NONCE_KEY', 'K4+OB$sVp;V?&U1F&_c+`z&gk~%Df%S.iF9c$8uC>&1$-vTJYOPg$]!?79;~Z/.B');
define('AUTH_SALT', 'R?TLb5RUbP~PFU2K]Z5fPZ/t1U[}S/y-Z$<:yt0Jh22.g<*-nlvdKR,uH*H{g2%8');
define('SECURE_AUTH_SALT', 'BK-U?`A+#rRHl8qjHX]nTfpqBiB2|C=Q[{XIo??_&W]qo&#cB-g-6&`Ja8yo;mIk');
define('LOGGED_IN_SALT', '1pMhb?2TdA+8]skBU2V:O]Q Eusi#<U6oL7z7P_azHMVc,=bnQU,`8z)a=IgK().');
define('NONCE_SALT', '5&;n)9X]tvr9i0F-z7 :xku[F5aESzVL`Wb#qS6{qo@WyRy98:ge[gQR6b4;q?7O');

define('MOOX_HASH', $_ENV['APP_KEY']);

define('LOCK_WP', $_ENV['LOCK_WP']);
define('HIDE_LOGIN', $_ENV['HIDE_LOGIN']);
define('FORGOT_PASSWORD', $_ENV['FORGOT_PASSWORD']);
define('ENABLE_MFA', $_ENV['ENABLE_MFA']);
define('REGISTRATION', $_ENV['REGISTRATION']);

$table_prefix = $_ENV['WP_PREFIX'];

define('WP_DEBUG', $_ENV['WP_DEBUG']);

if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__.'/');
}

require_once ABSPATH.'wp-settings.php';
