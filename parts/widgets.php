<?php 

require_once(get_template_directory() . '/widgets/Alumnus_Login_Form.php');
require_once(get_template_directory() . '/widgets/Alumnus_Register_Form.php');

// Register the internal widgets.
function register_widgets() {
    register_widget( 'Alumnus_Login_Form' );
    register_widget( 'Alumnus_Register_Form' );
}

add_action( 'widgets_init', 'register_widgets' );