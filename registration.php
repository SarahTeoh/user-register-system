<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="registration.php" method="post">
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
            <input type="text" name="password" required>
        </div>

        <div>
            <label for="confirm_password">Confirm Password : </label>
            <input type="text" name="confirm_password" required>
        </div>

        <button type="submit" name="register" value="register">Submit</button>

        <p>Already a user? <a href="login.php">Log in</a></p>
    </form>

    
</body>
</html>