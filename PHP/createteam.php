<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 09:00
 */

require 'header.php';

?>

<?php if (!isset($_SESSION['userid'])) {
    echo "<p>Please <a href='register.php'>Register</a> or <a href='login.php'>Login</a> before using this website</p>";
}
else{
    echo "<p>You are logged in, do you want to <a href='logout.php'>log out?</a></p>";

    ?>
    <form action="logincontroller.php" method="post">
        <input type="hidden" name="type" value="createteam">
        <div class="form-group">
            <label for="teamname">Team name</label>
            <input type="text" name="teamname" id="teamname">
        </div>

        <input type="submit" value="Add team">
    </form>

    <?php
}
?>



<?php
require 'footer.php';
