<?php
// Widgets
function alumni_widgets_init() {

    // Static Index Widget area
	register_sidebar( array(
		'name'          => 'Static Index Widet Area',
		'id'            => 'index_widget_area',
		'before_widget' => '<div class="cell small-10 small-offset-1 widgetBlock loginTile text-center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	// Dashbaord Widget area
	register_sidebar( array(
		'name'          => 'Dashboard Widget Area',
		'id'            => 'dashboard_widget_area',
		'before_widget' => '<div class="cell small-10 small-offset-1 widgetBlock loginTile text-center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	// Mobile Nav Widget area
	register_sidebar( array(
		'name'          => 'Mobile Nav Widget Area',
		'id'            => 'mobile_nav_widget_area',
		'before_widget' => '<div class="cell small-10 small-offset-1 widgetBlock loginTile text-center">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	// Contact Page Widget area
	register_sidebar( array(
		'name'          => 'Contact Page Widet Area',
		'id'            => 'contact_widget_area',
		'before_widget' => '<div class="cell small-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alumni_widgets_init' );