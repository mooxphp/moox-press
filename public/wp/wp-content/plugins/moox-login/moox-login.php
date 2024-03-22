<?php
/*
Plugin Name: Moox Press
Description: Plugin to redirect WordPress login attempts to Laravel
Author: Moox
Version: 0.1
*/

// Redirect WordPress login attempts to Laravel
add_action('init', function () {
    $url = strtok($_SERVER['REQUEST_URI'], '?');

    if (str_ends_with($url, 'wp-login.php') && ! isset($_GET['action'])) {
        wp_redirect('https://'.$_SERVER['SERVER_NAME'].'/admin/login');
        exit;
    }
});
