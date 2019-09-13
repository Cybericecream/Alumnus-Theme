<?php 

class Alumnus_Register_Form extends WP_Widget {
  public function __construct() {
    $widget_options = array(
      'description' => 'Alumnus Register Form which can be placed anywhere'
    );
    parent::__construct( 'alumnus_register_form', 'Alumnus Register Form', $widget_options);

    // Enable saving of custom user meta data.
    add_action( 'user_register', 'save_user_meta_data' );
    function save_user_meta_data( $user_id ) {
      if ( ! empty( $_POST['first_name'] ) ) {
        update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
      }
      if ( ! empty( $_POST['last_name'] ) ) {
        update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
      }
    }
  }
  
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if (!is_user_logged_in()) {
      echo '
        <div class="grid-container full">
          <form name="registerform" id="registerform" method="POST" class="grid-x" action="' . esc_url( site_url( 'wp-login.php?action=register' )) .'">
            <div class="loginTile__title cell small-12 text-center">
              <div class="active">
                <h2>Register for the Alumni</h2>
              </div>
            </div>
            <div class="loginTile__body cell large-4 large-offset-4 medium-8 medium-offset-2 small-12">
              <input type="text" placeholder="Username" class="loginTile__input" name="user_login" required>
              <input type="email" placeholder="Email" class="loginTile__input" name="user_email" required>
              <input type="text" placeholder="First Name" class="loginTile__input" name="first_name" required>
              <input type="text" placeholder="Last Name" class="loginTile__input" name="last_name" required>
              <button type="reset" class="btn">Clear</button>
              <button type="submit" class="btn primaryButton">Sign Up</button>
            </div>
          </form>
        </div>
      ';
    }
    echo $args['after_widget'];
  }
}