<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/pembelian.php';
include_once '../../models/pembeliandetail.php';
$database = new Database();
$db = $database->getConnection();
$item = new Pembelian($db);
$data = json_decode(file_get_contents("php://input"));
$item->trxid = $data->trxid;
$item->date_sell = $data->date_sell;
$item->nm_supplier = $data->nm_supplier;
$item->kasir = $data->kasir;
$item->grand_total = $data->grand_total;
$db->beginTransaction();
if($item->createpembelian()){
    $details = new PembelianDetail($db);
    foreach($data->details as $barang){ 
        $details->trxid = $data->trxid;
        $details->kd_brg = $barang->kd_brg;        
        $details->nm_brg = $barang->nm_brg;
        $details->hrg_jual = $barang->hrg_jual;
        $details->qty = $barang->qty;
        $details->sub_total = $barang->sub_total;
        if(!$details->createSellDetail()){
            $db->rollBack();
            http_response_code(500);
            echo json_encode('Produk '.$barang->nm_brg.' saldo tidak mencukupi.');
            return false;
        }
    }
    $db->commit();
    echo json_encode('pembelian created successfully.');
} else{
    $db->rollBack();
    echo json_encode('pembelian could not be created.');
}
?>