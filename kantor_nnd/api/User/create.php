<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/user.php';
$database = new Database();
$db = $database->getConnection();
$item = new user($db);
$data = json_decode(file_get_contents("php://input"));
$item->fullname = $data->fullname;
$item->email = $data->email;
$item->password = $data->password;
$item->roll = $data->roll;
$item->created = date('Y-m-d H:i:s');
if($item->createuser()){
    echo json_encode ('User created successfully.');
} else{
    echo json_encode ('User could not be created.');
}
?>