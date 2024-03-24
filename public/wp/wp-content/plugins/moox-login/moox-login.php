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

// API-based authentication
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/login/', [
        'methods' => 'POST',
        'callback' => 'custom_login',
        'permission_callback' => '__return_true',
    ]);
});

function custom_login(WP_REST_Request $request)
{
    $creds = [
        'user_login' => $request->get_param('username'),
        'user_password' => $request->get_param('password'),
        'remember' => true,
    ];

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        return new WP_REST_Response($user->get_error_message(), 403);
    }

    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, true);

    return new WP_REST_Response('Logged in', 200);
}

// Redirect WordPress login attempts to Laravel
add_action('init', function () {
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && ! isset($_GET['action'])) {
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/login');
        exit;
    }
});
