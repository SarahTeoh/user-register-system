<?php

session_start();

/* Check whether user logged in annot */
// Redirect user to log in page if haven't sign in 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in to view this page";
    header('Location: login.php');
};

/* If user logs out */
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Homepage</h1>
    <?php if (isset($_SESSION['success'])) :?>
        <div>
            <h3>
                <?php
                    echo "<strong>" . $_SESSION['success'] . "</strong>";
                    unset($_SESSION['success']);
                ?>  
            </h3>
        </div>
    <?php endif; ?>          
    
    <!-- If the user logs in, print information about the user -->
    <?php if (isset($_SESSION['username'])) : ?>
    
        <h1>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</h1>
        
        <!-- log out link 
            <a href="index.php?logout='1'">Log out</a> 
        --> 

        <form action="index.php" method="get">
            <button name="logout" value="1">Log out</button>
        </form>

    <?php endif; ?>
    
</body>
</html>