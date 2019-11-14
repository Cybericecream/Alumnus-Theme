<?php 

require_once(get_template_directory() . '/widgets/Alumnus_Login_Form.php');
require_once(get_template_directory() . '/widgets/Alumnus_Register_Form.php');
require_once(get_template_directory() . '/widgets/Alumnus_Post_Form.php');
require_once(get_template_directory() . '/widgets/User_Widget.php');
require_once(get_template_directory() . '/widgets/Alumnus_Callender.php');

// Register the internal widgets.
function register_widgets() {
    register_widget( 'Alumnus_Login_Form' );
    register_widget( 'Alumnus_Register_Form' );
    register_widget( 'Alumnus_Post_Form' );
    register_widget( 'user_widget' );
    register_widget( 'Alumnus_Callender' );
}

add_action( 'widgets_init', 'register_widgets' );