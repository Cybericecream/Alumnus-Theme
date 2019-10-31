<?php 

//Carousel Custom Post Type
function carousel_post() {
    $labels = array(
      'name'               => _x( 'Carousel', 'post type general name' ),
      'singular_name'      => _x( 'Carousel', 'post type singular name' ),
      'add_new'            => _x( 'Add Item', 'slider' ),
      'add_new_item'       => __( 'Add New Item' ),
      'edit_item'          => __( 'Edit Carousel' ),
      'new_item'           => __( 'New Carousel' ),
      'all_items'          => __( 'All Carousel Item\'s' ),
      'view_item'          => __( 'View Carousel Item\'s' ),
      'search_items'       => __( 'Search Carousel Item\'s' ),
      'not_found'          => __( 'No Carousel found' ),
      'not_found_in_trash' => __( 'No Carousel found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Carousel'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds the Items for the Carousel',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-images-alt2',
      'supports'      => array( 'title', 'thumbnail' ),
      'has_archive'   => true,
    );
    register_post_type( 'slider', $args ); 
  }

  function event_post() {
    $labels = array(
      'name'               => _x( 'Event Listing', 'post type general name' ),
      'singular_name'      => _x( 'Event List', 'post type singular name' ),
      'add_new'            => _x( 'Add Event', 'Events' ),
      'add_new_item'       => __( 'Add New Event' ),
      'edit_item'          => __( 'Edit Events' ),
      'new_item'           => __( 'New Events' ),
      'all_items'          => __( 'All Event Item\'s' ),
      'view_item'          => __( 'View Event Item\'s' ),
      'search_items'       => __( 'Search Events Item\'s' ),
      'not_found'          => __( 'No Envent found' ),
      'not_found_in_trash' => __( 'No Event found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Event'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds the Items for the Events List',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-calendar-alt',
      'supports'      => array( 'title', 'thumbnail' ),
      'has_archive'   => true,
    );
    register_post_type( 'events', $args ); 
  }
  
  add_action( 'init', 'carousel_post', 'event_post' );