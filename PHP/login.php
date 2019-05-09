<?php require 'header.php'; ?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <div class="login-page">
        <div class="summary">
            <h2>Login</h2>
            <p>Hier kunt u inloggen wanneer u een account heeft gecreërt.</p>
            <p>Door in te loggen kunt u:</p>
            <p>Het rooster zien van de meespelende teams van het toernooi.</p>
            <p>U kunt ook teams toevoegen naar wens.</p>
        </div>


        <form action="logincontroller.php" method="post">
            <input type="hidden" name="type" value="login">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input class="button" type="submit"  value="Login">
        </form>
    </div>
</div>

    <a href="index.php">Back to homepage</a>
    <a href="forgotpass.php">Forgot Password</a>
<?php require 'footer.php'; ?>