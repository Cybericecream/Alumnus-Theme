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

}
add_action( 'widgets_init', 'alumni_widgets_init' );