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
            $startYear = 2010;
            $endYear = date('Y');
            $gradYearOptions = '';
            for ($year = $endYear; $year >= $startYear; $year--) { 
                $gradYearOptions .= '<option value="' . $year . '">'. $year . '</option>';
            }
            ?>
                <?php require_once get_template_directory() . '/functions/alumnus_register.php' ?>
                <form class="grid-x grid-margin-x" name="registerForm" id="registerForm" method="POST" action="<?php echo esc_url( site_url( '/register' )) ?>">
                    <div class="small-12 cell">
                        <input type="text" placeholder="Username" class="loginTile__input" name="user_login" required>
                    </div>
                    <div class="small-12 cell"> 
                        <input type="email" placeholder="Email" class="loginTile__input" name="user_email" required>
                    </div>
                    <div class="small-12 cell"> 
                        <input type="password" placeholder="Password" class="loginTile__input" name="user_pass" required>
                    </div> 
                    <div class="small-12 cell"> 
                        <input type="password" placeholder="Password Confirm" class="loginTile__input" name="user_pass_confirm" required>
                    </div>
                    <div class="small-6 cell"> 
                        <input type="text" placeholder="First Name" class="loginTile__input" name="first_name" required>
                    </div>
                    <div class="small-6 cell"> 
                        <input type="text" placeholder="Last Name" class="loginTile__input" name="last_name" required>
                    </div>
                    <div class="small-6 cell">
                        <label for="yearGraduated" class="loginTile__label">Year Graduated</label>
                    </div>
                    <div class="small-6 cell">
                        <select name="yearGraduated" id="yearGraduated" class="loginTile__select">
                        <?php echo $gradYearOptions; ?>
                        </select>
                    </div>
                    <div class="small-6 cell text-center">
                        <button type="reset" class="btn">Clear</button>
                    </div>
                    <div class="small-6 cell text-center">
                        <button type="submit" class="btn primaryButton">Register</button>
                    </div>
                    <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
                    <input type='hidden' name='submit' />
                    </div>
                </form>
            <?php
            echo $args['after_widget'];
        }
        public function update( $new_instance, $old_instance ) {
        }
    }
}