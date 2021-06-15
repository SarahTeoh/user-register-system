<?php

session_start();

// Initialize variables
$username = '';
$email = '';

// Connecting to db
$db = mysqli_connect('localhost', 'root', '', 'user_register_system');

// Register users
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

?>