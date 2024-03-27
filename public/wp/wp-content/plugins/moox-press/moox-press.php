<?php
/*
Plugin Name: Moox Press
Description: Plugin for integrating WordPress with Laravel
Author: Moox
Version: 0.1
*/

// Get config
if (defined('MOOX_HASH')) {
    $mooxHash = MOOX_HASH;
}

if (defined('LOCK_WP')) {
    $lockWp = LOCK_WP;
}

if (defined('HIDE_LOGIN')) {
    $hideLogin = HIDE_LOGIN;
}

if (defined('FORGOT_PASSWORD')) {
    $forgotPassword = FORGOT_PASSWORD;
}

if (defined('ENABLE_MFA')) {
    $enableMfa = ENABLE_MFA;
}

if (defined('REGISTRATION')) {
    $registration = REGISTRATION;
}

if (defined('WP_DEBUG')) {
    $wpDebug = WP_DEBUG;
}

function moox_lock_wp_frontend()
{
    if (defined('LOCK_WP') && LOCK_WP) {
        if (! is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
            auth_redirect();
        }
    }
}
add_action('template_redirect', 'moox_lock_wp_frontend');

function moox_auth_token()
{
    if (isset($_GET['auth_token'])) {
        $token = $_GET['auth_token'];
        // TODO - Implement a function to validate the token and get the user ID
        $user_id = $token;

        if ($user_id) {
            wp_clear_auth_cookie();
            wp_set_auth_cookie($user_id);

            wp_redirect(admin_url());
            exit;
        }
    }
}
add_action('init', 'moox_auth_token');

function moox_redirect_logout()
{
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && isset($_GET['action']) && $_GET['action'] === 'logout') {
        wp_logout();
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/logout');
        exit;
    }
}
add_action('init', 'moox_redirect_logout');

function moox_redirect_login()
{
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && ! isset($_GET['action'])) {
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/login');
        exit;
    }
}
add_action('init', 'moox_redirect_login');
