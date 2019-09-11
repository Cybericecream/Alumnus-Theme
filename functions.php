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
    // if ( !is_user_logged_in() ) {
    if (!false) {
        $output = '
            <form method="POST" class="grid-x grid-padding-x first">
                <div class="loginTile__title cell small-12 grid-x text-center">
                    <div class="small-12 active">
                        <h2>Login to the Alumni</h2>
                    </div>
                </div>
                <div class="loginTile__body columns cell large-2 large-offset-5">
                    <input type="email" placeholder="Email" class="loginTile__input">
                    <input type="password" placeholder="Password" class="loginTile__input">
                    <button type="reset" class="btn">Clear Form</button>
                    <button type="submit" class="btn primaryButton">Login</button>
                </div>
            </form>
        ';
    } else {
        $output = '<h3>You\'re logged in</h3>';
    }
    return $output;
}

add_filter('widget_text', 'do_shortcode');

