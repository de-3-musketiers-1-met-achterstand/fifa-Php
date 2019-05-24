<?php
require 'header.php';

$sql = "SELECT result FROM matches";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="result-input">
        <h3>Resultaten</h3>
        <?php
        if ( $_SESSION['isAdmin'] ) {
            ?>

            <?php
        }
        ?>

    </div>
</div>

<?php
require 'footer.php';?>

