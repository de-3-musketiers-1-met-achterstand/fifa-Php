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
<a href="register.php">Register here</a>
<a href="login.php">login  here</a>

<?php if (!isset($_SESSION['userid'])) {
                echo "<p>Please <a href='register.php'>Register</a> or <a href='login.php'>Login</a> before using this website</p>";
            }
            else{
                echo "you are logged in";
            }?>
</body>
</html>