<?php

$dbhost = 'localhost';
$dbname = 'recipe_app';
$dbuser = 'root';
$dbpass = '';

$db = new PDO("mysql:host=$dbhost;dbname=$dbname",
    $dbuser,
    $dbpass
);
$db->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
