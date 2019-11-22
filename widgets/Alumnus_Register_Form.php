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
            $startYear = 1970;
            $endYear = date('Y');
            $gradYearOptions = '';
            for ($year = $endYear; $year >= $startYear; $year--) { 
                $gradYearOptions .= '<option value="' . $year . '">'. $year . '</option>';
            }
            ?>
                <?php require_once get_template_directory() . '/functions/alumnus_register.php' ?>
                <form class="grid-x grid-margin-x" name="registerForm" id="registerForm" method="POST" action="<?php echo esc_url( site_url( '/register' )) ?>">
                    <div class="small-12 cell">
                        <div>
                            <label for="username">Username </label>
                            <input type="text" id="username" placeholder="Username" class="loginTile__input" title="Username" name="user_login" required>
                        </div>
                    </div>
                    <div class="small-12 cell"> 
                        <div>
                            <label for="email">Email </label>
                            <input type="email" id="email" placeholder="Email" class="loginTile__input" title="Email" name="user_email" required>
                        </div>
                    </div>
                    <div class="small-12 cell"> 
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Password" class="loginTile__input" title="Password" name="user_pass" required>
                        </div>
                    </div> 
                    <div class="small-12 cell">
                        <div>
                            <label for="passwordConfirm">Password Confirm</label>
                            <input type="password" id="password" placeholder="Password Confirm" class="loginTile__input" title="Confirm Password" name="user_pass_confirm" required>
                        </div>
                    </div>
                    <div class="small-6 cell"> 
                        <div>
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" placeholder="First Name" class="loginTile__input" title="First Name" name="first_name" required>
                        </div>
                    </div>
                    <div class="small-6 cell"> 
                        <div>
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" placeholder="Last Name" class="loginTile__input" title="Last Name" name="last_name" required>
                        </div>
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
                </form>
            <?php
            echo $args['after_widget'];
        }
        public function update( $new_instance, $old_instance ) {
        }
    }
}