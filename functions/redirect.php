<?php 

function redirect_logged_in_users() {
    if (is_user_logged_in()) {
        $home_page = home_url();
        $page_viewed = $_SERVER['REQUEST_URI'];
        if ($page_viewed == '/register' || $page_viewed == '/login') {
            wp_redirect($home_page);
            exit;
        }

        if ($page_viewed == '/')
        {
            wp_redirect('/dashboard');
            exit;
        }
    }
}

add_action('init', 'redirect_logged_in_users');
