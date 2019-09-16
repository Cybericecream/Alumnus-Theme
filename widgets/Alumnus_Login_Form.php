<?php 

class Alumnus_Login_Form extends WP_Widget {
  public function __construct() {
    $widget_options = array(
      'description' => 'Alumnus Login Form which can be placed anywhere'
    );
    parent::__construct( 'Alumnus_Login_Form', 'Alumnus Login Form', $widget_options);
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    echo '
      <div class="grid-container">
        <form name="loginForm" id="loginForm" method="POST" action="' . esc_url( site_url( 'wp-login.php' )) . '">
          <div class="loginTile__body grid-x grid-margin-x">
            <div class="large-4 large-offset-4 cell">
              <input type="text" placeholder="Username or Email Address" class="loginTile__input" name="log" required>
            </div>
            <div class="large-4 large-offset-4 cell">
              <input type="password" placeholder="Password" class="loginTile__input" name="pwd" required>
            </div>
            <div class="large-2 large-offset-4 cell">
              <button type="reset" class="btn">Clear</button>
            </div>
            <div class="large-2 cell">
              <button type="submit" class="btn primaryButton">Login</button>
            </div>
            <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
          </div>
        </form>
      </div>
    ';
    echo $args['after_widget'];
  }
}