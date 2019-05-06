<?php
require 'header.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php if (!isset($_SESSION['userid'])) {
                echo "<a href=register.php>Register here</a>";
                echo "<a href=login.php>login  here</a>";
                echo "<p>Please <a href='register.php'>Register</a> or <a href='login.php'>Login</a> before using this website</p>";
            }
            else{
                echo "<p>You are logged in, do you want to <a href='logout.php'>log out?</a></p>";

                echo "<p>You can create a new team <a href='createteam.php'>here!</a></p>";
            }?>
</body>
</html>