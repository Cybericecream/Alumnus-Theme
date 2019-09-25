<?php 
  if ( isset( $_POST['submit'] ) ) {
    global $wpdb;

    function validate_email(string $email) {
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      return $email;
    }

    $username = $wpdb->escape($_POST['user_login']); 
    $email = validate_email($wpdb->escape($_POST['user_email'])); 
    $password = $wpdb->escape($_POST['user_pass']);
    $firstName = $wpdb->escape($_POST['first_name']);
    $lastName = $wpdb->escape($_POST['last_name']);
    $yearGraduated = $wpdb->escape($_POST['yearGraduated']);

    // Validation 
    $formErrors = array();
    // Username validation
    if ( empty( $username ) ) {
      $errorObject = array(
				"message" => "Username is required"
			);
			array_push( $formErrors, $errorObject );
    }

    $usernameTaken = get_user_by( 'login', $username);
    if ( $usernameTaken ) {
      $errorObject = array(
        "message" => "Username is already being used!"
      );
      array_push ( $formErrors, $errorObject );
    }

    // Email validation
    if ( empty( $email ) ) {
      $errorObject = array(
        "message" => "Email is required"
      );
      array_push ( $formErrors, $errorObject );
    }

    if (! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
      $errorObject = array(
        "message" => "Email is not valid"
      );
      array_push ( $formErrors, $errorObject );
    }

    $emailTaken = get_user_by( 'email', $email );
    if ( $emailTaken ) {
      $errorObject = array(
        "message" => "Email is already being used!"
      );
      array_push ( $formErrors, $errorObject );
    }

    if ( empty( $password ) ) {
      $errorObject = array(
        "message" => "Password is required"
      );
      array_push ( $formErrors, $errorObject );
    }

    if ( count( $formErrors ) > 0 ) {
      // Do something with the errors.
      foreach ( $formErrors as $key => $errorObject ) {
				foreach ( $errorObject as $key => $value ) {
					echo '<div class="error-message">' . $value . '</div>';
				}
			}
    } else {
      // Register the user
      $userdata = array(
        'user_login' =>  $username,
        'user_email' =>  $email,
        'user_pass' =>  $password,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'display_name' => $username
      );
      $user_id = wp_insert_user ( $userdata );
      if ( is_wp_error($user_id) ) {
		echo '<div class="error-message">' . $user_id->get_error_message() . '</div>';
	  } else {
		global $userRole;
		$user = new WP_User( $user_id );

        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        do_action( 'wp_login', $user->user_login );
        wp_redirect( home_url() );
      }
    }
  }