<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    // include database et rdv model
    include_once '../database/DB.php';
    include_once '../models/M-Admin.php';

    // Instansiation de Database 
    $database = new DB();
    $db = $database->connect();

    // Instansiation  
    $client = new ADMIN($db);

    // get data
    $data = json_decode(file_get_contents("php://input"));

    $client->id = $data->id;
    // $client->id = $_GET['id'];

    if ($client->supprimer_client()) {
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
