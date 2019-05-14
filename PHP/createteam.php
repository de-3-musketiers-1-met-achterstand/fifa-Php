<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 09:00
 */

require 'header.php';

?>
<div class="container" >
    <div class="content" >
        <form action="logincontroller.php" method="post">
            <input type="hidden" name="type" value="createteam">
            <div class="form-group">
                <label for="teamname">Team name</label>
                <input type="text" name="teamname" id="teamname">
            </div>

            <input type="submit" value="Add team">
        </form>
    </div>
</div>





<?php
require 'footer.php';
