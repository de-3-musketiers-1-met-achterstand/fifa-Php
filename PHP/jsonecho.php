<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 10:28
 */

require 'config.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($teams);

?>


