<?php
require 'header.php';
?>
<div class="container">
    <div class="content">
        <form action="logincontroller.php" method="post">
            <input type="hidden" name="type" value="forgotpass">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">

            <input type="submit" value="Forgot">
        </form>
        <?php
        if(isset ($_GET['forgotpass'])) {
            if($_GET['forgotpass']) {
                $password = $_GET['forgotpass'];
                echo "<p>$password</p>";

            }}
        ?>
        <a href="login.php">Terug naar Login</a>
    </div>
</div>

<?php
require 'footer.php';
?>