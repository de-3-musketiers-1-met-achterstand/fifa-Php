<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 20-5-2019
 * Time: 11:25
 */

require 'config.php';



if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $key = $_GET['key'];
    $sql = "SELECT * FROM tokens WHERE token = :token";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':token' => $key
    ]);
    $return = $prepare->fetchAll(2);

    if($return){

            $sql = "SELECT * FROM  matches";
            $query = $db->query($sql);
            $matches = $query->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');

            echo json_encode($matches);
        
    }

}