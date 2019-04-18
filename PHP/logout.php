<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 18-4-2019
 * Time: 09:11
 */

session_start();
session_destroy();
header('location: index.php');