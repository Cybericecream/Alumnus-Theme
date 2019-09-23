<?php 

if (! class_exists('Alumnus_Login_Form')) {
    class Alumnus_Login_Form extends WP_Widget {
        public function __construct() {
            $widget_options = array(
            'description' => 'Alumnus Login Form which can be placed anywhere'
            );
            parent::__construct( 'Alumnus_Login_Form', 'Alumnus Login Form', $widget_options);
        }
        public function widget( $args, $instance ) {
            echo $args['before_widget'];
        ?>
        <div class="grid-container">	
            <?php require_once dirname(__FILE__) . '\..\functions\alumnus_login.php'; ?>
            <form name="loginForm" id="loginForm" method="POST" action="<?php echo esc_url( site_url( '/login' )) ?>">
            <div class="loginTile__body grid-x grid-margin-x">
                <div class="large-4 large-offset-4 cell">
                <input type="text" placeholder="Username or Email Address" class="loginTile__input" name="log">
                </div>
                <div class="large-4 large-offset-4 cell">
                <input type="password" placeholder="Password" class="loginTile__input" name="pwd">
                </div>
                <div class="large-2 large-offset-4 cell">
                <button type="reset" class="btn">Clear</button>
                </div>
                <div class="large-2 cell">
                <button type="submit" class="btn primaryButton" value="true" name="submit">Login</button>
                </div>
                <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
                <input type='hidden' name='submit' />
            </div>
            </form>
        </div>
            <?php
            echo $args['after_widget'];
        }
    }
}