<?php
require 'config.php';

if ($_POST['type'] === 'register') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username ,password) VALUES( :username , :password)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username'     => $username,
        ':password'  => $hashedpwd
    ]);

    header('location: index.php?success=register');
    exit;
}
