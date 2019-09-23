<?php
	if ( $_POST['submit'] ) { 
		global $wpdb; 
		//We shall SQL escape all inputs 
		$username = $wpdb->escape($_POST['log']); 
		$password = $wpdb->escape($_POST['pwd']); 
		$remember = $wpdb->escape($_POST['rememberme']); 
		
		// Error handling
		$formErrors = array();
		
		// Username validation
		if ( empty( $username ) ) {
			$errorObject = array(
				"message" => "Username is empty"
			);
			array_push( $formErrors, $errorObject );
		}

		$usernameLength = strlen($username);
		$min = 3;
		$max = 254;
		if (! ($usernameLength >= $min && $usernameLength <= $max) ) {
			$errorObject = array(
				"message" => 'Username has be within ' . $min . ' and ' . $max . ' characters'
			);
			array_push ( $formErrors, $errorObject );
		} 
		
		// Password Validation 
		if ( empty( $password ) ) {
			$errorObject = array(
				"message" => "Password is empty"
			);
			array_push( $formErrors, $errorObject );
		}

		$passwordLength = strlen($password);
		$min = 3;
		$max = 254;
		if (! ($passwordLength >= $min && $passwordLength <= $max) ) {
			$errorObject = array(
				"message" => 'Password has be within ' . $min . ' and ' . $max . ' characters'
			);
			array_push ( $formErrors, $errorObject );
		} 
		
		if ( count( $formErrors ) > 0 ) {
			// Display the errors
			foreach ( $formErrors as $key => $errorObject ) {
				foreach ( $errorObject as $key => $value ) {
					echo '<div class="error-message">' . $value . '</div>';
				}
			}
		} else {
			// Process the login information
			$creds = array(); 
			$creds['user_login'] = $username; 
			$creds['user_password'] = $password; 
			$user_verify = wp_signon( $creds, false );
		}
	}