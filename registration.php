<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registration</title>
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post">
        <?php include('errors.php'); ?>
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label for="email">Email : </label>
            <input type="text" name="email" required>
        </div>

        <div>
            <label for="password">Password : </label>
            <input class="show_hide_password" type="password" name="password" required>
        </div>

        <div>
            <label for="confirm_password">Confirm Password : </label>
            <input class="show_hide_password" type="password" name="confirm_password" required>
        </div>

        <input class="toggle_pass_check" type="checkbox">Show Password
        <br>

        <button type="submit" name="register" value="register">Submit</button>

        <p>Already a user? <a href="login.php">Log in</a></p>
    </form>

    <script type="text/javascript" src="togglepass.js"></script>
</body>
</html>