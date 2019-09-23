<?php 
  if ( isset( $_POST['submit'] ) ) {
    global $wpdb;

    function validate_email(string $email) {
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      return $email;
    }

    $username = $wpdb->escape($_POST['user_login']); 
    $email = validate_email($wpdb->escape($_POST['user_email'])); 
    $firstName = $wpdb->escape($_POST['first_name']);
    $lastName = $wpdb->escape($_POST['last_name']);
    $yearGraduated = $wpdb->escape($_POST['yearGraduated']);

    // Validation 
    $formErrors = array();
    // Username validation
    if ( empty( $username ) ) {
      $errorObject = array(
				"message" => "Username is empty"
			);
			array_push( $formErrors, $errorObject );
    }

    // Email validation
    if ( empty( $email ) ) {
      $errorObject = array(
        "message" => "Email is empty"
      );
      array_push ( $formErrors, $errorObject );
    }

    if (! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
      $errorObject = array(
        "message" => "Email is not valid"
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
    }
  }