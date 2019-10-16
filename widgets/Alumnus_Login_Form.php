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
                <?php require_once get_template_directory() . '/functions/alumnus_login.php' ?>
                <form name="loginForm" id="loginForm" method="POST" action="<?php echo esc_url( site_url( '/login' )) ?>">
                    <input type="text" placeholder="Username or Email Address" class="loginTile__input" name="log">
                    <input type="password" placeholder="Password" class="loginTile__input" name="pwd">
                    <button type="reset" class="btn">Clear</button>
                        <button type="submit" class="btn primaryButton">Login</button>
                    <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
                    <input type='hidden' name='submit' />
                </form>
        <?php
            echo $args['after_widget'];
        }
    }
}