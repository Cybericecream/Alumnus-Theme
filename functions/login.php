<?php
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) { 
		global $wpdb; 
		
		//We shall SQL escape all inputs 
		$username = $wpdb->escape($_POST['log']); 
		$password = $wpdb->escape($_POST['pwd']); 
		$remember = $wpdb->escape($_POST['rememberme']); 
		
		function form_input_length($inputName, $inputValue, $min, $max) {
			$fieldLength = strlen( $inputValue );
			$result = array();
			if (! ($fieldLength >= $min && $fieldLength <= $max) ) {
				$message = $inputName . " must be between " . $min . " and " . $max . " characters";
				$result['passed'] = false;
				$result['message'] = $message;
			} else {
				$result['passed'] = true;
				$result['message'] = '';
			}
			return $result;
		}
	
		// Error handling
		$formErrors = array();
		
		// Username validation
		if ( empty( $username ) ) {
			$errorObject = array(
				"message" => "Username is empty"
			);
			array_push( $formErrors, $errorObject );
		}
		
		// Password Validation 
		if ( empty( $password ) ) {
			$errorObject = array(
				"message" => "Password is empty"
			);
			array_push( $formErrors, $errorObject );
		}
		
		if ( count( $formErrors ) > 0 ) {
			// Display the errors
			foreach ( $formErrors as $key => $errorObject ) {
				foreach ( $errorObject as $key => $value ) {
					echo '<div>' . $value . '</div>';
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