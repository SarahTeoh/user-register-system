<?php
/* Start a new session. Can't use $_SESSION global variable if didn't write this line */
session_start();

$errors = array();

/* Connecting to db */
$hostname = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'user_register_system';
$db = mysqli_connect($hostname, $user, $pass, $dbname);

if (isset($_POST['register'])){
    /* Initialize variables */
    $username = '';
    $email = '';

    /* Sanitises the input. Escape any sepcial characters, if any */
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['confirm_password']);

    /* Check if any required input field is empty */
    if (empty($username)) {
        array_push($errors, "Username is required");
    };
    if (empty($email)) {
        array_push($errors, "Email is required");
    };
    if (empty($password1)) {
        array_push($errors, "Password is required");
    };

    /* Check if password 1 and 2 match */
    if ($password2 != $password1) {
        array_push($errors, "Passwords did not match");
    };

    /* Check if username or email already exists */
    // MySQL query 
    $existing_user_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
    // Query results
    $results = mysqli_query($db, $existing_user_query);
    
    // If username or email already exists
    if (mysqli_num_rows($results) > 0) {
        // Associative array of query results
        $existing_user_assoc = mysqli_fetch_assoc($results);    
        // If username exists
        if ($existing_user_assoc['username'] === $username) {array_push($errors, "This username has already been taken. Please use another username");};
        // If email has been used to register account
        if ($existing_user_assoc['email'] === $email) {array_push($errors, "Email has already been registered");};
    };
    
    /* If no errors */
    if (count($errors) == 0) {
        
        // Encrypt password
        // md5() and sha1() are outdated because they always encrypt same password to same hash values, 
        // which is dangerous
        $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
        
        // Run query on db to register user
        $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$encrypted_password')";
        mysqli_query($db, $query);

        // Store username and success status in server
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        // Redirect to another page
        header('Location: index.php');
        };

}else if(isset($_POST['login'])) {
    // Username and password input by the user
    // NOTE: Do not use same variable name with variables in POST
    $loginusername = mysqli_real_escape_string($db, $_POST['username']);
    $loginpassword = mysqli_real_escape_string($db, $_POST['password']);

    /* Check if any required input field is empty */
    if (empty($loginusername)) {
        array_push($errors, "Username is required");
    };
    if (empty($loginpassword)) {
        array_push($errors, "Password is required");
    };

    // Query on db
    $search_user_query = "SELECT * FROM user WHERE username = '$loginusername'";
    $user_data = mysqli_query($db, $search_user_query); // NOTE: query will always return TRUE as long as the query went OK (even if it returns empty) 
    $user_data_assoc = mysqli_fetch_assoc($user_data);
    
    /* If no errors */
    if (count($errors) == 0) {
        // If the username exists in db and password correct, log the user in
        if (mysqli_num_rows($user_data) > 0){
            if (password_verify($loginpassword, $user_data_assoc['password'])){
                $_SESSION['username'] = $loginusername;
                $_SESSION['status'] = "Logged in successfully";
                header('Location: index.php');
            }else{
                // If password is wrong
                array_push($errors, "Incorrect password");
            };
        }else{ 
            array_push($errors, "Invalid username or password");
        };
    };    
};
?>