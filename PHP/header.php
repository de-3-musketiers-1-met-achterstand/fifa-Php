<?php
require 'config.php';
?>
<html><!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Football</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header>
    <nav>
        <div class="header">
            <div class="container">
                <img src="../images/header-voetbal.jpg" alt="header image" class="football-header">
                <div class="menu">
                    <a href="index.php">Home</a>
                    <?php
                    if ($_SESSION['userid']) {
                        ?>
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

                </div>
            </div>
        </div>
    </nav>
</header>