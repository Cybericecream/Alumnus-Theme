<?php 

class Alumnus_Login_Form extends WP_Widget {
  public function __construct() {
    $widget_options = array(
      'classname' => '',
      'description' => 'Alumnus Login Form which can be placed anywhere'
    );
    parent::__construct( 'alumnus_login_form', 'Alumnus Login Form', $widget_options);
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
      if (!is_user_logged_in()) {
        echo '
          <form method="POST" class="grid-x grid-padding-x first" action="' . esc_url( site_url( 'wp-login.php', 'login_post' )) . '">
              <div class="loginTile__title cell small-12 grid-x text-center">
                  <div class="small-12 active">
                    <h2>Login to the Alumni</h2>
                  </div>
              </div>
              <div class="loginTile__body columns cell large-2 large-offset-5">
                  <input type="text" placeholder="Email" class="loginTile__input" name="log">
                  <input type="password" placeholder="Password" class="loginTile__input" name="pwd">
                  <button type="reset" class="btn">Clear Form</button>
                  <button type="submit" class="btn primaryButton">Login</button>
              </div>
          </form>
        ';
      } else {
        echo '<p>You\'re logged in.</p>';
      }
      echo $args['after_widget'];
  }
}