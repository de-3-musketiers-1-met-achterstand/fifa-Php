<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 20-5-2019
 * Time: 11:25
 */

require 'config.php';

$sql = "SELECT * FROM  matches";
$query = $db->query($sql);
$matches = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($matches);