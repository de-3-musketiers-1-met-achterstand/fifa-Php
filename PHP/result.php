<?php
require 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM matches WHERE id = $id";
    $query = $db->query($sql);
    $match = $query->fetchAll(PDO::FETCH_ASSOC);



var_dump($match);
}
else {
    header('Location: poules.php');
}

?>

<div class="container">
    <div class="login-page">
        <form action="logincontroller.php?id=<?=$id?>" method="post">
            <input type="hidden" name="type" value="result">
            <div class="form-group">
            </div>

            <div class="form-group">
                <label><?=$match['team1']?></label>
                <label for="out"><?=$match['id']?></label>
                <input type="number" name="out" id="out">
                <label><?=$match['team2']?></label>
                <label for="home"><?=$match['id']?></label>
                <input type="number" name="home" id="home">
            </div>
            <input class="button" type="submit"  value="verzenden">
        </form>
    </div>
</div>

<?php
require 'footer.php';?>

