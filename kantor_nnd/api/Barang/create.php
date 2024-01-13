<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/database.php';
    include_once '../../models/barang.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Barang($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->kd_brg = $data->kd_brg;
    $item->nm_brg = $data->nm_brg;
    $item->hrg_brg = $data->hrg_brg;
    $item->stock = $data->stock;
    $item->jenis_brg = $data->jenis_brg;
    $item->hrg_beli = $data->hrg_beli;
    if($item->createBarangs()){
        echo json_encode('Barang created successfully.');
    } else{
        echo json_encode('Barang could not be created.');
    }
?>