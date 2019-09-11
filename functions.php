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

function alumnus_login_manager_init() {
    add_shortcode( 'alumnus-login-form', 'alumnus_login_form' );
}

add_action('init', 'alumnus_login_manager_init');

// Generate the html content for alumnus login
function alumnus_login_form() {
    if ( !is_user_logged_in() ) {
        $args = array(
            'echo' => false,
            'remember' => true,
            'redirect' => get_permalink(),
            'form_id' => 'alumnus_login',
            'id_username' => 'alumnus_user_login',
            'id_password' => 'almunus_password_login',
            'id_remember' => 'alumnus_remember_me',
            'id_submit' => 'alumnus_submit',
            'label_username' => __( 'Enter your username'),
            'label_password' => __( 'Password'),
            'label_remember' => __( 'Remember Me' ),
            'label_log_in' => __( 'Login' ),
            'value_username' => '',
            'value_remember' => false
        );
        $output = wp_login_form( $args );
    } else {
        $output = '<h3>You\'re logged in</h3>';
    }
    return $output;
}

add_filter('widget_text', 'do_shortcode');

