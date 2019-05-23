<?php
require 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
</head>

<body>
<header class="container">
    <nav class="nav">

            <a href="index.php">Home</a>
            <?php
            if ($_SESSION['userid']) {
                ?>
                <a href="poules.php">Poules</a>
                <a href="logout.php">Log out</a>
                <?php
            }
            else{
                ?>
                <a href="login.php">Login</a>
                <a href="register.php">Create Account</a>
                <?php
            }
            ?>

    </nav>
</header>
