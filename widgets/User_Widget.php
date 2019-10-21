<?php 

// Creating the widget
class user_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'user_widget',

// Widget name will appear in UI
__('User Widget', ''),

// Widget description
array( 'description' => __( 'This widget displays your user information, this widget is made for the backend of a site.', '' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
// $title = apply_filters( 'widget_title', $instance['title'] );
// $tag_line = apply_filters( 'widget_tag_line', $instance['tag_line'] );

// // before and after widget arguments are defined by themes
// echo $args['before_widget'];
// if ( ! empty( $title ) )
// echo $args['before_title'] . $title . $args['after_title'];

// // This is where you run the code and display the output
// if ( ! empty( $tag_line ) )
// echo $args['before_tag_line'] . $tag_line . $args['after_tag_line'];

// echo $args['after_widget'];

$current_user = wp_get_current_user();
 
/*
 * @example Safe usage: $current_user = wp_get_current_user();
 * if ( ! ( $current_user instanceof WP_User ) ) {
 *     return;
 * }
 */
// // before and after widget arguments are defined by themes
echo $args['before_widget'];
?>
<div class="grid-x userWidget">
    <div class="cell small-3">
        <?php echo get_avatar( $current_user->ID, 32 ); ?>
    </div>
    <div class="cell small-7 text-left">
        <div class="grid-x">
            <div class="cell small-12">
                <h2><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></h2>
            </div>
            <div class="cell small-12">
                <h3><?php echo $current_user->user_login; ?></h3>
            </div>
        </div>
    </div>
    <div class="cell small-2">
        <ul class="dropdown menu" data-dropdown-menu>
            <li>
                <a href="#"><i class="fas fa-chevron-circle-down"></i></a>
                <ul class="menu">
                <?php wp_nav_menu(
                                array(
                                    'menu' => 'settings-menu',
                                    'link_before' => '<li>',
                                    'link_after' => '</li>',
                                )
                                );?>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php
// printf( __( 'Username: %s', 'textdomain' ), esc_html( $current_user->user_login ) ) . '<br />';
// printf( __( 'User email: %s', 'textdomain' ), esc_html( $current_user->user_email ) ) . '<br />';
// printf( __( 'User first name: %s', 'textdomain' ), esc_html( $current_user->user_firstname ) ) . '<br />';
// printf( __( 'User last name: %s', 'textdomain' ), esc_html( $current_user->user_lastname ) ) . '<br />';
// printf( __( 'User display name: %s', 'textdomain' ), esc_html( $current_user->display_name ) ) . '<br />';
// printf( __( 'User ID: %s', 'textdomain' ), esc_html( $current_user->ID ) );
 echo $args['after_widget'];
}

// // Widget Backend
// public function form( $instance ) {
// if ( isset( $instance[ 'title' ] ) && isset( $instance[ 'tag_line' ] ) ) {
// $title = $instance[ 'title' ];
// $tag_line = $instance[ 'tag_line' ];
// }
// else {
// $title = __( 'New title', '' );
// $tag_line = __( 'New Tag Line', '' );
// }




//}

// // Updating widget replacing old instances with new
// public function update( $new_instance, $old_instance ) {
// $instance = array();
// $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
// $instance['tag_line'] = ( ! empty( $new_instance['tag_line'] ) ) ? strip_tags( $new_instance['tag_line'] ) : '';
// return $instance;
// }
} // Class widget ends here
