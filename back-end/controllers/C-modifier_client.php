<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: applecation/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    // include database et rdv model
    include_once '../database/DB.php';
    include_once '../models/M-Admin.php';

    // Instansiation Database 
    $database = new DB();
    $db = $database->connect();

    // Instansiation  
    $rdv = new ADMIN($db);

    // get donnée
    $data = json_decode(file_get_contents("php://input"));

    // push data into properties
    $client->nom = $data->nom;
    $client->prenom = $data->prenom;
    $client->age = $data->age;
    $client->profession = $data->profession;
    $client->reference_client = $data->reference_client;

    if ($client->Modifier_Client()) {
        echo json_encode(
            array('message' => "la modification a été effectuer")
        );
    } else {
        echo json_encode(
            array('message' => "la modification n'a pas été effectuer")
        );
    }

?>