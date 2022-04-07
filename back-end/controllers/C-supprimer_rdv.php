<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    // include database et rdv model
    include_once '../database/DB.php';
    include_once '../models/M-RDV.php';

    // Instansiation de Database 
    $database = new DB();
    $db = $database->connect();

    // Instansiation  
    $rdv = new RDV($db);

    // get data
    $data = json_decode(file_get_contents("php://input"));

    $rdv->id = $data->id;

    if ($rdv->supprimer_rdv()) {
        echo json_encode
        (
            array("message" => "la suppression a été effectuer")
        );
    } else {
        echo json_encode
        (
            array("message" => "la suppression n'a pas effectuer")
        );
    }

?>