<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: applecation/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    include_once '../database/DB.php';
    include_once '../models/M-loginClient.php';

    // instansiation database

    $database = new DB();
    $db = $database->connect();

    // instansiation de login
    $login = new login($db);

    $data = json_decode(file_get_contents("php://input"));

    $login->reference_client = $data->reference_client;

    $row = $login->login();
    if ($row) {
        echo json_encode(
            array("reference_client" => $row)
        );
    } else {
        echo json_encode(
            array("reference_client" => $row)
        );
    }

?>