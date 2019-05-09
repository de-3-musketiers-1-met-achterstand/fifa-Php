<?php
require 'header.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM teams WHERE creatorid= :id";
$query = $db->prepare($sql);
$query->execute([
    ':id' => $_SESSION['userid']
]);

$ownTeams = $query->fetchAll(PDO::FETCH_ASSOC);

?>



<body>
<div class="container">
    <div class="homepage-title">
        <h1>Voetbal Toernooi</h1>
    </div>
    <div class="homepage-summary">
        <p>U kunt hier één toernooi volgen tussen meerdere teams. <br>
        De mogelijkheid is er ook om teams aan te maken, resultaten krijg je ook. <br>
        Maar de resultaten krijg je pas wanneer je een account heb en ingelogt bent. <br>
        Dus log snel in!</p>
    </div>


<?php if (!isset($_SESSION['userid'])) {
    echo "<p>Alsjeblieft <a href='register.php'>Registreer</a> of <a href='login.php'>Login</a> voor het gebruik van de website!</p>";
}
else{
    echo "<p>Je bent ingelogd, wil je <a href='logout.php'>uitloggen?</a></p>";

    echo "<p>Je kan een team creëren, <a href='createteam.php'>hier!</a></p>";
    ?>

    <div class="teams-title">
        <h1>Teams</h1>
    </div>
    <div class="teams-list">
    <ul>
        <?php
        foreach ($teams as $team) {
            echo "<li><a href='detailteam.php?id=${team['teamid']}'>${team['teamname']}</a></li>";
        }
        ?>
    </ul>
</div>

    <h1>Own Teams</h1>
    <P>You can edit your teams here by clicking on the team you want to edit</P>
    <ul>
        <?php
        foreach ($ownTeams as $team) {
            echo "<li><a href='editteam.php?id=${team['teamid']}'>${team['teamname']}</a></li>";
        }
        ?>
    </ul>

    <?php
}
?>
</div>
</body>
<?php
require 'footer.php';
?>
