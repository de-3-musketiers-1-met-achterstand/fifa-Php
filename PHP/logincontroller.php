<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: index.php?error=wrongpage');
    exit;
}
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




    if(password_verify($password, $result['password'])){
        $_SESSION['userid'] = $result['userid'];

    }
    else{
        $message = "Wachtwoord komt niet overeen!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit;
    }
    header('location: index.php');
    exit;
}
if ( $_POST['type'] === 'forgotpass' ) {
    $username = $_POST['username'];

if ($_POST['type'] == 'createteam') {
    $teamname = $_POST['teamname'];
    $creatorid = $_SESSION['userid'];

    $sql = "INSERT INTO teams (teamname, creatorid) VALUES (:teamname, :creatorid)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':teamname' => $teamname,
        ':creatorid' => $creatorid
    ]);

    $msg = "Team is succesvol aangemaakt!";

    header("location: index.php?msg=$msg");
    exit;
}
    $sql = "SELECT password FROM users WHERE username=:username";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username' => $username
    ]);
    $result = $prepare->fetchColumn();

    header("location: forgotpass.php?forgotpass=$result");
}