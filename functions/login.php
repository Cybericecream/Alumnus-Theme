<?php
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) { 
		global $wpdb; 
		
		//We shall SQL escape all inputs 
		$username = $wpdb->escape($_POST['log']); 
		$password = $wpdb->escape($_POST['pwd']); 
		$remember = $wpdb->escape($_POST['rememberme']); 

		$creds = array(); 
		$creds['user_login'] = $username; 
		$creds['user_password'] = $password; 
		
		$user_verify = wp_signon( $creds, false );
	}