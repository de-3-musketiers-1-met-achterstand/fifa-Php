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



<main>
    <div class="container">
        <div class="content">
            <div class="home-title">
                <h1>Voetbal Toernooi</h1>
            </div>
            <div class="home-items">
                <p>U kunt hier één toernooi volgen tussen meerdere teams.
                    De mogelijkheid is er ook om teams aan te maken, resultaten krijg je ook.
                    Maar de resultaten krijg je pas wanneer je een account heb en ingelogt bent.
                    Dus log snel in!</p>

            </div>

            <div class="home-items">
                <?php if (!isset($_SESSION['userid'])) {
                    echo "<p>Alsjeblieft <a href='register.php'>Registreer</a> of <a href='login.php'>Login</a> voor het gebruik van de website!</p>";
                }
                else{
                echo "<p>Je bent ingelogd, wil je <a href='logout.php'>uitloggen?</a></p>";

                echo "<p>Je kan een team creëren, <a href='createteam.php'>hier!</a></p>";
                ?>
                <P>Je kunt je eigen teams veranderen doormiddel van hieronder op het team te klikken</P>
            </div>


            <div class="teams-items">
                <h1>Teams</h1>
            </div>
            <div class="teams-items">
                <ul>
                    <?php
                    foreach ($teams as $team) {
                        echo "<li><a href='detailteam.php?id=${team['teamid']}'>${team['teamname']}</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="teams-items">
                <h1>Eigen teams</h1>

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
        </div>
    </div>
</main>

<?php
require 'footer.php';
?>
