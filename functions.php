<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

require_once(get_template_directory() . '/widgets/Alumnus_Login_Form.php');
require_once(get_template_directory() . '/widgets/Alumnus_Register_Form.php');

// Register the internal widgets.
function register_widgets() {
    register_widget( 'Alumnus_Login_Form' );
    register_widget( 'Alumnus_Register_Form' );
}

add_action( 'widgets_init', 'register_widgets' );

function redirect_login_page() {
    $login_page = home_url('/login');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if ($page_viewed == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}

function redirect_register_page() {
    $register_page = home_url('/register');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if ($page_viewed == 'wp-login.php?action=register' && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($register_page);
        exit;
    }
}

add_action('init', 'redirect_login_page');
add_action('init', 'redirect_register_page');

function custom_login_failed() {
    $login_page = home_url('/login');
    wp_redirect($login_page . '?login=failed');
    exit;
}

add_action('wp_login_failed', 'custom_login_failed');

function logout_redirect() {
    $login_page = home_url('/login');
    wp_redirect($login_page . '?login=failed');
    exit;
}

add_action('wp_logout', 'logout_redirect');

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