<?php 
if (! class_exists('Alumnus_Register_Form')) {
  class Alumnus_Register_Form extends WP_Widget {
    public function __construct() {
      $widget_options = array(
        'classname' => 'alumnus_register_form',
        'description' => 'Alumnus Register Form which can be placed anywhere'
      );
      parent::__construct( 'Alumnus_Register_Form', 'Alumnus Register Form', $widget_options);
    }

    public function form( $instance ) {
      
    }
    
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      $startYear = 1980;
      $endYear = date('Y');
      $gradYearOptions = '';
      for ($year = $endYear; $year >= $startYear; $year--) { 
        $gradYearOptions .= '<option value="' . $year . '">'. $year . '</option>';
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
              <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
            </div>
          </form>
        </div>
      ';
      echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {

    }
  }
}