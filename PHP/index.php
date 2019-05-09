<?php
require 'header.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<body>
<?php if (!isset($_SESSION['userid'])) {
    echo "<p>Please <a href='register.php'>Register</a> or <a href='login.php'>Login</a> before using this website</p>";
}
else{
    echo "<p>You are logged in, do you want to <a href='logout.php'>log out?</a></p>";

    echo "<p>You can create a new team <a href='createteam.php'>here!</a></p>";
    ?>

    <h1>Teams</h1>
    <ul>
        <?php
        foreach ($teams as $team) {
            echo "<li>${team['teamname']}</li>";
        }
        ?>
    </ul>

    <?php
}
?>
</body>
<?php
require 'footer.php';
?>
