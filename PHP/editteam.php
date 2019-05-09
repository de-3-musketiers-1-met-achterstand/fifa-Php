<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 9-5-2019
 * Time: 12:19
 */

require 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM teams WHERE teamid= :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

$team = $prepare->fetch(PDO::FETCH_ASSOC);
?>

<form action="logincontroller.php?id=<?=$id?>" method="post">
    <input type="hidden" name="type" value="edit">
    <div class="form-group">
        <label for="teamname">Team name</label>
        <input type="text" name="teamname" id="teamname" value="<?=$team['teamname']?>">
    </div>

    <input type="submit" value="Edit Team">
</form>

<?php
require 'footer.php';