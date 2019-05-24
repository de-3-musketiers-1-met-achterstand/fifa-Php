<?php
require 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    header('Location: poules.php');
}
?>


<form action="logincontroller.php?id=<?=$id?>" method="post">
    <input type="hidden" name="type" value="result">
    <div class="form-group">
    </div>

    <div class="form-group">
        <label for="out">uit</label>
        <input type="number" name="out" id="out">
        <label for="home">thuis</label>
        <input type="number" name="home" id="home">
    </div>
    <input class="button" type="submit"  value="verzenden">
</form>
<?php
require 'footer.php';?>

