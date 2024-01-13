<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/barang.php';

$database = new Database();
$db = $database->getConnection();
if(isset($_GET['id'])){
    $item = new Barang($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getSingleBarangS();
    if($item->kd_brg != null){
        // create array
        $emp_arr = array(
        "id" => $item->id,
        "kd_brg" => $item->kd_brg,
        "nm_brg" => $item->nm_brg,
        "stock" => $item->stock,
        "hrg_brg" => $item->hrg_brg,
        "jenis_brg" => $item->jenis_brg,
        "hrg_beli" => $item->hrg_beli
        );
        http_response_code(200);
        echo json_encode($emp_arr);
    }
    else{
        http_response_code(404);
        echo json_encode("Barang not found.");
    }
}
else {
    $items = new Barang($db);
    $stmt = $items->getBarangs();
    $itemCount = $stmt->rowCount();
    if($itemCount > 0){
        $BarangArr = array();
        $BarangArr["body"] = array();
        $BarangArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "kd_brg" => $kd_brg,
                "nm_brg" => $nm_brg,
                "stock" => $stock,
                "hrg_brg" => $hrg_brg,
                "jenis_brg" => $jenis_brg
            );
            array_push($BarangArr["body"], $e);
        }
        echo json_encode($BarangArr);
    }
    else{
        http_response_code(404);
        echo json_encode(array("messstock" => "No record found."));
    }
}
?>