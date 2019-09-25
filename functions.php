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

// Register the Font Awesome Library
require_once(get_template_directory().'/functions/font-awesome.php');

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

// Pulling Custom Post Types
require_once(get_template_directory().'/parts/custom-post-types.php');

//Custom Menus
require_once(get_template_directory().'/parts/custom-menu.php');

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


require_once(get_template_directory() . '/parts/widgets.php');

// Redirect
require_once(get_template_directory() . '/functions/redirect.php');

// Alumnus login functionality
require_once(get_template_directory() . '/functions/alumnus_login_form.php'); 

// Alumnus registration functionality
require_once(get_template_directory() . '/functions/alumnus_register_form.php'); 
=======
// Carousel pull in
// require_once(get_template_directory().'/functions/carousel.php');
