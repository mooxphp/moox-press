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

define('AUTH_KEY', $_ENV['WP_AUTH_KEY']);
define('SECURE_AUTH_KEY', $_ENV['WP_SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $_ENV['WP_LOGGED_IN_KEY']);
define('NONCE_KEY', $_ENV['WP_NONCE_KEY']);
define('AUTH_SALT', $_ENV['WP_AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['WP_SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $_ENV['WP_LOGGED_IN_SALT']);
define('NONCE_SALT', $_ENV['WP_NONCE_SALT']);

define('MOOX_HASH', $_ENV['APP_KEY']);

define('LOCK_WP', isset($_ENV['LOCK_WP']) ? $_ENV['LOCK_WP'] : false);
define('HIDE_LOGIN', isset($_ENV['HIDE_LOGIN']) ? $_ENV['HIDE_LOGIN'] : false);
define('FORGOT_PASSWORD', isset($_ENV['FORGOT_PASSWORD']) ? $_ENV['FORGOT_PASSWORD'] : false);
define('ENABLE_MFA', isset($_ENV['ENABLE_MFA']) ? $_ENV['ENABLE_MFA'] : false);
define('REGISTRATION', isset($_ENV['REGISTRATION']) ? $_ENV['REGISTRATION'] : false);
define('REDIRECT_EDITOR', isset($_ENV['REDIRECT_EDITOR']) ? $_ENV['REDIRECT_EDITOR'] : false);

$table_prefix = isset($_ENV['WP_PREFIX']) ? $_ENV['WP_PREFIX'] : 'wp_';

$wp_debug = isset($_ENV['WP_DEBUG']) ? $_ENV['WP_DEBUG'] : false;

define('WP_DEBUG', $wp_debug);

if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__.'/');
}

require_once ABSPATH.'wp-settings.php';
