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

    header('location: index.php');
    exit;
}
if ( $_POST['type'] === 'login' ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=:username";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username'     => $username
    ]);
    $result = $prepare->fetch();




    if(password_verify($password , $result['password'])){
        $_SESSION['id'] = $result['id'];

    }
    else{



    }
    header('location: index.php');
    exit;
}