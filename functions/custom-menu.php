<?php

// Custom Menus

// Footer Menus
function custom_new_menu() {
	register_nav_menus(
		array(
		'primary-menu' => __( 'Primary Menu' ),
		'mobile-nav' => __( 'Mobile Navigation Menu' ),
		'footer-menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'custom_new_menu' );


