<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 9-5-2019
 * Time: 09:24
 */

require 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM teams WHERE teamid= :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

$team = $prepare ->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="content">
        <h1><?php echo htmlentities($team['teamname']); ?></h1>

        <?php
        if ( $_SESSION['isAdmin'] ) {
            ?>
            <form action="logincontroller.php?id=<?=$id;?>" method="post">
                <input type="hidden" name="type" value="delete">
                <input type="submit" value="Delete this team">
            </form>
            <?php
        }
        ?>

    </div>
</div>



<?php
require 'footer.php';
?>
