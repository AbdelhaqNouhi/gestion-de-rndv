<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: applecation/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    include_once '../database/DB.php';
    include_once '../models/M-loginAdmin.php';
    
    // instansiation database

    $database = new DB();
    $db = $database->connect();

    // instansiation de login
    $login = new login_admin($db);

    $data = json_decode(file_get_contents("php://input"));

    $login->reference_admin = $data->reference_admin;

    $row = $login->login_admin();
    if ($row) {
        echo json_encode(
            array("reference_admin" => $row)
        );
    } else {
        echo json_encode(
            array("reference_admin" => $row)
        );
    }

?>