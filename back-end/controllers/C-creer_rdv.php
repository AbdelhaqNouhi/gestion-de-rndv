<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
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
    $data = json_decode(file_get_contents("php://input"));
    // push data into properties
    $rdv->date = $data->date;
    $rdv->creneau = $data->creneau;
    $rdv->sujet = $data->sujet;
    $rdv->client_Id = $data->client_Id;

    if ($rdv->creer_rdv()) {
        echo json_encode(
            "la création a été effectuer"
        );
    } else {
        echo json_encode(
            "la création n'a pas été effectuer"
        );
    }

?>