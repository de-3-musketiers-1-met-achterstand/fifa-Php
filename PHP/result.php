<?php
require 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM matches WHERE id = $id";
    $query = $db->query($sql);
    $match = $query->fetchAll(PDO::FETCH_ASSOC);




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
                <label>team 1</label>
                <label for="out"><?=$match['id']?></label>
                <input type="number" name="out" id="out"><br>
                <label>team 2</label>
                <label for="home"><?=$match['id']?></label>
                <input type="number" name="home" id="home"><br>

                <label>Scheids </label>
                <label for="referee"><?=$match['id']?></label>
                <input type="text"  name="referee"  id="referee">
            </div>

            <input class="button" type="submit"  value="Verzenden">
        </form>
    </div>
</div>

<?php
require 'footer.php';?>

