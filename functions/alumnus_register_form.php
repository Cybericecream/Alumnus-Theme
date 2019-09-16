<?php

function registered_user_setup( $user_id ) {
    if ( isset( $_POST['first_name'] ) ) {
        update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
    }
    if ( isset( $_POST['last_name'] ) ) {
        update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
    }
    if ( isset( $_POST['yearGraduated'] ) ) {
        update_user_meta( $user_id, 'yearGraduated', sanitize_text_field( $_POST['yearGraduated'] ) );
    }
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    $user = get_user_by( 'id', $user_id );
    do_action( 'wp_login', $user->user_login );
    wp_redirect( home_url() );
    exit;
}
add_action( 'user_register', 'registered_user_setup' );


function redirect_register_page() {
    $register_page = home_url('/register');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if ($page_viewed == 'wp-login.php?action=register' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($register_page);
        exit;
    }
}

add_action('init', 'redirect_register_page');