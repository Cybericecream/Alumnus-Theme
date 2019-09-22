<?php 
  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    global $wpdb;
    echo $wpdb->escape($_POST['yearGraduated']);
  }