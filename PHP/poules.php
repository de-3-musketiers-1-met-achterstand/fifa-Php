<?php

require 'header.php';
$sql = "SELECT * FROM teams"; //gewoon een opslag van een string die je later gaat gebruiken
$query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
$teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

$sql = "SELECT * FROM matches";
$query = $db->query($sql);
$matches = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<main class="container">
    <div class="competition">
        <div class="matches">

            <form action="logincontroller.php" method="post">
                <input type='hidden' name='type' value='create-competition'>


                <div class="make-matches">
                    <?php if ($_SESSION['isAdmin']) {
                        echo  "<h3>Matches Pagina</h3>";
                        echo "<button type='submit'>Wedstrijd Maken</button>";
                    }
                    ?>
                </div>
            </form>

    </div>
<div class="matches">
    <?php
    foreach ($matches as $match){
        $teamfilter1 = htmlentities($match['team1']);
        $teamfilter2 = htmlentities($match['team2']);
        $ref         = htmlentities($match['referee']);
        if ($_SESSION['isAdmin']){
            echo "<li><a href='result.php?id=".$match['id']."'>$teamfilter1 - $teamfilter2 ".$match['result1']."-".$match['result2']." " . $ref." </a></li>";
        }
        else{
            echo "<li> $teamfilter1 - $teamfilter2 ".$match['result1']."-".$match['result2']." " . $ref." </li>";
        }


    }
    ?>
</div>

</main>
<?php
require 'footer.php';
?>