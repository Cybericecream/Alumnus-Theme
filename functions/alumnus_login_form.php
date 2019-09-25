<?php 
function redirect_login_page() {
    $login_page = home_url('/login');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if ($page_viewed == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}

function alumnus_init_functions() {
    redirect_login_page();
}

add_action('init', 'alumnus_init_functions');

function logout_redirect() {
    $login_page = home_url('/login');
    wp_redirect($login_page . '?logged_out=true');
    exit;
}

add_action('wp_logout', 'logout_redirect');