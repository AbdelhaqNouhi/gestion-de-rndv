<?php

    // Headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: applecation/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    include_once '../database/DB.php';
    include_once '../models/M-registerClient.php';

    // instansiation Database 
    $database = new DB();

    // db = connect->conn
    $db = $database->connect();

    // instansiation de la class client pour register
    $client = new register($db);

    // get donnée et decode
    $data   =   json_decode(file_get_contents("php://input"));

    // pusher les données dans properties
    $client->nom = $data->nom;
    $client->prenom = $data->prenom;
    $client->age = $data->age;
    $client->profession = $data->profession;
    $client->reference_client = $data->reference_client;

    // insert new client in database
    if ($client->register()) {
        echo json_encode(
            $client->reference_client
        );
    } else {
        echo json_encode(
            "déja exist"
        );
    }

?>