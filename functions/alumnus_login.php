<?php
	if ( isset( $_POST['submit'] ) ) { 
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
					echo '<div class="error-message">' . $value . '</div>';
				}
			}
		} else {
			// Process the login information
			$creds = array(); 
			$creds['user_login'] = $username; 
			$creds['user_password'] = $password; 
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) ) {
				echo '<div class="error-message">' . $user->get_error_message() . '</div>';
			} else {
				wp_set_current_user($user->ID);
				wp_redirect( home_url() );
			}
		}
	}