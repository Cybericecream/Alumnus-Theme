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
      'menu_position' => 6,
      'menu_icon' => 'dashicons-calendar-alt',
      'supports'      => array( 'title', 'thumbnail' ),
      'has_archive'   => true,
      'register_meta_box_cb' => 'wporg_add_custom_box',
    );
    register_post_type( 'events', $args ); 
  }
  add_action( 'init', 'carousel_post' );
  add_action( 'init', 'event_post' );

  
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function meta_display_callback( $post ) {
  include plugin_dir_path( __FILE__ ) . 'alumnus-metabox-form.php';
}


/**
 * Register meta boxes.
 */
function meta_register_meta_boxes() {
  add_meta_box( 'meta-1', __( 'Callender Details', 'meta' ), 'meta_display_callback', 'events' );
}
add_action( 'add_meta_boxes', 'meta_register_meta_boxes' );

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function meta_save_meta_box( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if ( $parent_id = wp_is_post_revision( $post_id ) ) {
      $post_id = $parent_id;
  }
  $fields = [      
      'hcf_published_date',
      'event_description',
  ];
  foreach ( $fields as $field ) {
      if ( array_key_exists( $field, $_POST ) ) {
          update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
      }
   }
}
add_action( 'save_post', 'meta_save_meta_box' );