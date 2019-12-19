<?php

function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').
    '/login/styles-login.css" />';
}
add_action('login_head', 'my_custom_login');

function custom_loginlogo() {
    echo '<style type="text/css">
    h1 a {
        background - image: url('.get_stylesheet_directory_uri().' / login / images / OMD.png) !important;
    } <
    /style>';
}
add_action('login_head', 'custom_loginlogo');

function login_checked_remember_me() {
    add_filter('login_footer', 'rememberme_checked');
}
add_action('init', 'login_checked_remember_me');

function rememberme_checked() {
    echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

function wpb_remove_loginshake() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'wpb_remove_loginshake');

function mb_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'mb_login_url');

function mb_login_title() {
    return get_option('blogname');
}
add_filter('login_headertitle', 'mb_login_title');
