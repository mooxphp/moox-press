<?php
/*
Plugin Name: Moox Press
Description: Plugin for integrating WordPress with Laravel
Author: Moox
Version: 0.1
*/

// Token-based authentication
add_action('init', function () {
    if (isset($_GET['auth_token'])) {
        $token = $_GET['auth_token'];

        $user_id = $token; // Implement a function to validate

        if ($user_id) {
            wp_clear_auth_cookie();
            wp_set_auth_cookie($user_id);

            wp_redirect(admin_url());
            exit;
        }
    }
});

// After WordPress logout, redirect to Laravel logout
add_action('init', function () {
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && $_GET['action'] === 'logout') {
        wp_logout();
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/logout');
        exit;
    }
});

// Redirect WordPress login attempts to Laravel
add_action('init', function () {
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && ! isset($_GET['action'])) {
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/login');
        exit;
    }
});
