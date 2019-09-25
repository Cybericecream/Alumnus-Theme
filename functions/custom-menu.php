<?php

// Custom Menus

// Footer Menus
function custom_new_menu() {
	register_nav_menus(
		array(
		'my-theme-menu' => __( 'Theme Menu' ),
		'footer-menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'custom_new_menu' );


