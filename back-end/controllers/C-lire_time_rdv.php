<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');
    // if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') die(); 
    
    include_once '../database/DB.php';
    include_once '../models/M-RDV.php';

    $database = new DB();
    $db = $database->connect();

    $rdv = new RDV($db);

    $data = json_decode(file_get_contents("php://input"));

    $result = $rdv->read_date_rdv();

    if ($result) {
        echo json_encode($result);
    }
    else {
        echo json_encode("errore");
    }
?>
