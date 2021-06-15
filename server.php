<?php

/* Start a new session. Can't use $_SESSION global variable if didn't write this line */
session_start();

/* Initialize variables */
$username = '';
$email = '';

$errors = array();

/* Connecting to db */
$db = mysqli_connect('localhost', 'root', '', 'user_register_system');

/* Escape any sepcial characters, if any */
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

/* Check if any required input field is empty */
if (empty($username)) {array_push($errors, "Username is required")};
if (empty($email)) {array_push($errors, "Email is required")};
if (empty($password)) {array_push($errors, "Password is required")};

/* Check if password 1 and 2 match */
if ($confim_password != $password) {array_push($errors, "Passwords did not match")};

/* Check if username or email already exists */
// MySQL query 
$existing_user_query = "SELECT * FROM user WHERE username = $username or email = $email LIMIT 1";
// Query results
$results = mysqli_query($db, $existing_user_query);
// Associative array of query results
$existing_user_assoc = mysqli_fetch_assoc($results);

// If username or email already exists
if ($results) {
    // If username exists
    if ($existing_user_assoc['username'] === $username) {array_push($errors, "Username already exists")};
    // If email has been used to register account
    if ($existing_user_assoc['email'] === $email) {array_push($errors, "Email has already been used")};
};

/* If no errors */
if (count($errors) == 0) {
    // Encrypt password
    $encrypted_password = md5($password);
    
    // Run query on db to register user
    $query = "INSERT INTO user (username, email, password) VALUES ($username, $email, $encrypted_password)";
    mysqli_query($db, $query);
    
    // Store username and success status in server
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    // Redirect to another page
    header('Location: index.php');
}
?>