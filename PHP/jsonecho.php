<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 10:28
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



                    header('Content-Type: application/json');
                    $sql = "SELECT * FROM teams";
                    $query = $db->query($sql);
                    $teams = $query->fetchAll(PDO::FETCH_ASSOC);



                    echo json_encode($teams);

            }

}