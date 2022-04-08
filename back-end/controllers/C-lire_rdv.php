<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');
    if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') die(); 
    
    // include database et rdv model
    include_once '../database/DB.php';
    include_once '../models/M-RDV.php';

    // Instansiation Database 
    $database = new DB();
    $db = $database->connect();

    // Instansiation  
    $rdv = new RDV($db);

    // get donnée

    $rdv->id = $_GET["id"];
    
    $result = $rdv->lire_rdv();
    if ($result) {
        echo json_encode(
            $result
        );
    } else {
        echo json_encode(
            array("Ton rendez-vous" => $result)
        );
    }

?>