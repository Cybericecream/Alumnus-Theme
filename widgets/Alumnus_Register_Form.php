<?php 
if (! class_exists('Alumnus_Register_Form')) {
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

        if (! empty( $_POST['yearGraduated'] ) ) {
          update_user_meta( $user_id, 'yearGraduated', sanitize_text_field( $_POST['yearGraduated'] ) );
        }
      }
    }

    public function form( $instance ) {

    }
    
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      if (!is_user_logged_in()) {
        $startYear = 1980;
        $endYear = date('Y');
        $gradYearOptions = '';
        for ($year = $endYear; $year >= $startYear; $year--) { 
          $gradYearOptions .= '<option name="yearGraduated" value="' . $year . '">'. $year . '</option>';
        }
        echo '
          <div class="grid-container">
            <form name="registerForm" id="registerForm" method="POST" action="' . esc_url( site_url( 'wp-login.php?action=register' )) .'">
              <div class="loginTile__body grid-x grid-margin-x">
                <div class="large-4 large-offset-4 cell">
                  <input type="text" placeholder="Username" class="loginTile__input" name="user_login" required>
                </div>
                <div class="large-4 large-offset-4 cell"> 
                  <input type="email" placeholder="Email" class="loginTile__input" name="user_email" required>
                </div>
                <div class="large-4 large-offset-4 cell"> 
                  <input type="password" placeholder="Password" class="loginTile__input" name="user_password" required>
                </div>
                <div class="large-2 large-offset-4 cell"> 
                  <input type="text" placeholder="First Name" class="loginTile__input" name="first_name" required>
                </div>
                <div class="large-2 cell"> 
                  <input type="text" placeholder="Last Name" class="loginTile__input" name="last_name" required>
                </div>
                <div class="large-2 large-offset-4 cell">
                  <label for="yearGraduated" class="loginTile__label">Year Graduated</label>
                </div>
                <div class="large-2 cell">
                  <select name="yearGraduated" id="yearGraduated" class="loginTile__select">
                  ' . $gradYearOptions . '
                  </select>
                </div>
                <div class="large-2 large-offset-4 cell">
                  <button type="reset" class="btn">Clear</button>
                </div>
                <div class="large-2 cell">
                  <button type="submit" class="btn primaryButton">Register</button>
                </div>
              </div>
            </form>
          </div>
        ';
      }
      echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {

    }
  }
}