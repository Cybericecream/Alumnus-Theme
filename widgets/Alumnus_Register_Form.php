<?php 

class Alumnus_Register_Form extends WP_Widget {
  public function __construct() {
    $widget_options = array(
      'classname' => '',
      'description' => 'Alumnus Register Form which can be placed anywhere'
    );
    parent::__construct( 'alumnus_register_form', 'Alumnus Register Form', $widget_options);
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if (!is_user_logged_in()) {
      echo '
      <div class="grid-container full">
        <form method="POST" class="grid-x" action="' . esc_url( site_url( 'wp-login.php?action=register' )) .'">
          <div class="loginTile__title cell small-12 text-center">
            <div class="active">
              <h2>Register for the Alumni</h2>
            </div>
          </div>
          <div class="loginTile__body cell large-4 large-offset-4 medium-8 medium-offset-2 small-12">
            <input type="text" placeholder="Username" class="loginTile__input" name="user_login">
            <input type="email" placeholder="Email" class="loginTile__input" name="user_email">
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