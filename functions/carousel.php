<?php

function register_post_type( $post_type, $args = array() ) {
    global $wp_post_types;
 
    if ( ! is_array( $wp_post_types ) ) {
        $wp_post_types = array();
    }
 
    // Sanitize post type name
    $post_type = sanitize_key( $post_type );
 
    if ( empty( $post_type ) || strlen( $post_type ) > 20 ) {
        _doing_it_wrong( __FUNCTION__, __( 'Post type names must be between 1 and 20 characters in length.' ), '4.2.0' );
        return new WP_Error( 'post_type_length_invalid', __( 'Post type names must be between 1 and 20 characters in length.' ) );
    }
 
    $post_type_object = new WP_Post_Type( $post_type, $args );
    $post_type_object->add_supports();
    $post_type_object->add_rewrite_rules();
    $post_type_object->register_meta_boxes();
 
    $wp_post_types[ $post_type ] = $post_type_object;
 
    $post_type_object->add_hooks();
    $post_type_object->register_taxonomies();
 
    /**
     * Fires after a post type is registered.
     *
     * @since 3.3.0
     * @since 4.6.0 Converted the `$post_type` parameter to accept a `WP_Post_Type` object.
     *
     * @param string       $post_type        Post type.
     * @param WP_Post_Type $post_type_object Arguments used to register the post type.
     */
    do_action( 'registered_post_type', $post_type, $post_type_object );
 
    return $post_type_object;
}