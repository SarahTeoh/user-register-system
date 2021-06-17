<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log in</title>
</head>
<body>
    <div class="header">
        <h2>Log in</h2>
    </div>

    <form method="post">
        <?php include('errors.php'); ?>
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label for="password">Password : </label>
            <input class="show_hide_password" type="password" name="password" required>
            <i class="hide fa fa-eye-slash" aria-hidden="true" style="display:none;"></i>
            <i class="show fa fa-eye" aria-hidden="true"></i>
        </div>

        <button type="submit" name="login" value="login">Log in</button>

        <p>Not a user? <a href="registration.php">Register here</a></p>
    </form>

    <script type="text/javascript" src="togglepass.js"></script>
</body>
</html>