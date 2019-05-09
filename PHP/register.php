<?php
require 'header.php';
?>
<form action="logincontroller.php" method="post" >
    <input type="hidden" name="type" value="register">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <input type="submit" value="Register" name="register-submit">


    </form>
<?php
require 'footer.php';
?>