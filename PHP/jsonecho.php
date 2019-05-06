<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 10:28
 */

require 'header.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($teams);

?>


