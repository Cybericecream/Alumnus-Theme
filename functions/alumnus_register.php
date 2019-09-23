<?php 
  if ( $_POST['submit'] ) {
    global $wpdb;
    $username = $wpdb->escape($_POST['user_login']); 
    $email = $wpdb->escape($_POST['user_email']); 
    $firstName = $wpdb->escape($_POST['first_name']);
    $lastName = $wpdb->escape($_POST['last_name']);
    $yearGraduated = $wpdb->escape($_POST['yearGraduated']);
    
		echo $yearGraduated;

  }