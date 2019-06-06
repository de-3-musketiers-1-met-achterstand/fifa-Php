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
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Geen geldig email adres!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit;
    }

    $sql = "INSERT INTO users(username ,password, email) VALUES( :username , :password , :email)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username'     => $username,
        ':password'  => $hashedpwd,
        ':email' => $email
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
        session_start();
        $_SESSION['userid'] = $result['userid'];
        $_SESSION['isAdmin'] = $result['admin'];
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
    $sql = "SELECT password FROM users WHERE username=:username";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username' => $username
    ]);
    $result = $prepare->fetchColumn();

    header("location: forgotpass.php?forgotpass=$result");
}

if ($_POST['type'] === 'createteam') {
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

if ($_POST['type'] === 'delete') {
    $id = $_GET['id'];
    $sql = "DELETE from teams WHERE teamid= :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    $msg = "Team is succesvol verwijderd!";

    header("location: index.php?msg=$msg");
    exit;
}

if ($_POST['type'] === 'edit') {
    $teamname = $_POST['teamname'];
    $id = $_GET['id'];

    $sql = "UPDATE teams SET teamname= :teamname WHERE teamid= :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':teamname' => $teamname,
        ':id' => $id
    ]);

    $msg = "Team naam is gewijzigd!";

    header("location: index.php?msg=$msg");
    exit;
}
if ($_POST['type'] == 'create-competition') {



    $sqldelete = "DELETE FROM matches";
    $querydel = $db->query($sqldelete); //verzoek naar de database, voer sql van hierboven uit
    $preparedel = $db->prepare($sqldelete);
    $preparedel->execute([
        ':id' => $team
    ]);


    $sql = "SELECT * FROM teams";
    $query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
    $teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

    $teamsArray = array();

    foreach ($teams as $team) {
        array_push($teamsArray, $team['teamname']);
    }

    $arrLength = count($teamsArray);


    for ( $i = 0; $i < $arrLength; $i++)
    {
        for ($x = 0; $x < count($teamsArray); $x++ )
        {
            if($teamsArray[0] !== $teamsArray[$x])
            {
                $matchsql = "INSERT INTO matches (id, team1, team2 )
                        values (:id,:team1 , :team2)";
                $prepare = $db->prepare($matchsql);
                $prepare->execute([
                    ':id' => $id,
                    ':team1' => $teamsArray[0],
                    ':team2' => $teamsArray[$x]
                ]);
            }
        }
        array_shift($teamsArray);
    }
    //exit;
    header("Location: poules.php");

}
if ( $_POST['type'] === 'result' ) {
    if(!isset($_SESSION['isAdmin'])){
        header('Location: index.php?error=nopermission');
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
        header('Location: poules.php');
    }

    $out = $_POST['out'];
    $home = $_POST['home'];

    $score = $out . "-" . $home;


    $sql = "UPDATE matches SET result1 = :result WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':result' => $out,
        ':id' => $id
    ]);

    $sql = "UPDATE matches SET result2 = :result WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':result' => $home,
        ':id' => $id
    ]);


    header('Location: poules.php?success=result');
}
if ($_POST['type'] === 'key'){
    if(isset($_SESSION['isAdmin'])){

    }
    else{
        header('Location: index.php?error=nopermission');
        exit();
    }
    $random = md5(rand($min = 999999999, $max = 99999999));
    echo $random;
    $sql = "INSERT INTO tokens(token) VALUES('$random')";
    $query = $db->query($sql);

    header('location: keys.php?create=success');
}
if ($_POST['type'] === 'deletekey'){

    if(isset($_SESSION['isAdmin'])){

    }
    else{
        header('Location: index.php?error=nopermission');
        exit();
    }
    $id = trim($_GET['id']);
    $sql = "DELETE from tokens WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    echo 'test2';

    header('location: keys.php?delete=success');
    exit;
}

