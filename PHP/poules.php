<?php

require 'header.php';
$sql = "SELECT * FROM teams"; //gewoon een opslag van een string die je later gaat gebruiken
$query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
$teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

$sql = "SELECT * FROM matches";
$query = $db->query($sql);
$matches = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<<<<<<< Updated upstream
<!--
<main>
    <div class="container">
        <div class="poules">
            <h3>Dit zijn de Poules:</h3>
            <ul>
                <li>Poule</li>
            </ul>

            <div class="poule-form">
                <h4>Voeg een Poule toe:</h4>
                <form action="logincontroller.php">


                    <label for="poule"><b>Poule</b></label>
                    <input type="text" placeholder="Poule Naam" name="poule-name" required>

                    <button type="submit">Poule Toevoegen</button>
-->


<main class="container">
    <div class="competition">

            <h4>Maak een wedstrijdschema:</h4>
=======

    <div class="competition">
        <div class="container">
            <h4>Wedstrijdschema:</h4>
>>>>>>> Stashed changes

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

        echo "<li>$teamfilter1 - $teamfilter2</li>";
    }
    ?>
</div>

<<<<<<< Updated upstream
=======
    if ($_SESSION['isAdmin']) {
        echo "<li><a href='result.php'>$teamfilter1 - $teamfilter2</a></li>";

        ?> <form action="fifaController.php" method="post">
            <div class='form-group'>
                <label for="result">Uitslag</label>
                <input type="hidden" value="insert-result1">
                <input type="text" name="result" id="result1">
            </div>

            <input type="submit" value="Uitslag">
        </form>

        <form action="fifaController.php" method="post">
            <div class='form-group'>
                <label for="result">Uitslag</label>
                <input type="hidden" value="insert-result2">
                <input type="text" name="result" id="result2">
            </div>

            <input type="submit" value="Uitslag">
        </form>
<?PHP
    }
    else {
    echo "<li>$teamfilter1 - $teamfilter2</li>";
    }
}
?>
>>>>>>> Stashed changes


</main>


<?php

require 'footer.php';
?>

