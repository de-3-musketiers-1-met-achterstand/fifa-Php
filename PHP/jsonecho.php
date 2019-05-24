<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 6-5-2019
 * Time: 10:28
 */

require 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

            if(isset($_GET['key'])){

                if($_GET['key'] === 'hDMc4pFrC3')
                {
                    header('Content-Type: application/json');
                    $sql = "SELECT * FROM teams";
                    $query = $db->query($sql);
                    $teams = $query->fetchAll(PDO::FETCH_ASSOC);



                    echo json_encode($teams);
                }
            }

}


