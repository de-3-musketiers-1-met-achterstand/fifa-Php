<?php

require 'header.php';
$sql = "SELECT * FROM teams"; //gewoon een opslag van een string die je later gaat gebruiken
$query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
$teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

$sql = "SELECT * FROM matches";
$query = $db->query($sql);
$matches = $query->fetchAll(PDO::FETCH_ASSOC);

?>
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



    <div class="competition">
        <div class="container">
            <h4>Maak een wedstrijdschema:</h4>

            <form action="logincontroller.php" method="post">
                <input type='hidden' name='type' value='create-competition'>
                <label for="wedstrijdschema"><b>Maak een Wedstrijdschema</b></label>

                <button type="submit">Wedstrijdschema Maken</button>
            </form>
        </div>
    </div>

<?php
foreach ($matches as $match){
    $teamfilter1 = htmlentities($match['team1']);
    $teamfilter2 = htmlentities($match['team2']);

echo "<li>$teamfilter1 - $teamfilter2</li>";
}
?>


</main>


<?php

require 'footer.php';
?>

