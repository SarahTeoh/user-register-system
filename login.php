<?php include server.php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <div class="header">
        <h2>Log in</h2>
    </div>

    <form action="login.php" method="post">
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label for="password">Password : </label>
            <input type="text" name="password" required>
        </div>

        <button type="submit" name="login" value="login">Log in</button>

        <p>Not a user? <a href="registration.php">Register here</a></p>
    </form>

    
</body>
</html>