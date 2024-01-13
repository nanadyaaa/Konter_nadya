<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/user.php';
session_start();
if(!isset($_SESSION['user'])){
    http_response_code(404);
    echo json_encode("You are not Log In.");
    return false;
}

$database = new Database();
$db = $database->getConnection();
if(isset($_GET['id'])){
    $item = new user($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getSingleuser();
if($item->fullname != null){
// create array
$emp_arr = array(
    "id" => $item->id,
    "fullname" => $item->fullname,
    "email" => $item->email,
    "password" => $item->password,
    "roll" => $item->roll,
    "created" => $item->created,
    );
    http_response_code(200);
    echo json_encode($emp_arr);
    }
    else{
    http_response_code(404);
    echo json_encode("User not found.");
    }
}
else {
    $items = new user($db);
    $stmt = $items->getuser();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
    $employeeArr = array();
    $employeeArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $e = array(
    "id" => $id,
    "fullname" => $fullname,
    "email" => $email,
    "password" => $password,
    "roll" => $roll,
    "created" => $created
    );
    array_push($employeeArr["body"], $e);
    }
    echo json_encode($employeeArr);
    }
    else{
    http_response_code(404);
    echo json_encode(
    array("message" => "No record found.")
    );
    }
    }
?>