<?php

// Custom Menus

// Footer Menus
function custom_new_menu() {
	register_nav_menus(
		array(
		'primary-menu' => __( 'Primary Menu' ),
		'mobile-nav' => __( 'Mobile Navigation Menu' ),
		'footer-left' => __( 'Left Footer' ),
		'footer-centre' => __( 'Centre Footer' ),
		'footer-right' => __( 'Right Footer' )
		)
	);
}
add_action( 'init', 'custom_new_menu' );


