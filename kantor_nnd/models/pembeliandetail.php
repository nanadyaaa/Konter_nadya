<?php
class PembelianDetail{
    // Connection
    private $conn;
    // Table
    private $db_table = "penjualan_detail";
    private $dbm_table = "barang";
    // Columns
    public $id;
    public $kd_brg;
    public $trxid;
    public $nm_brg;
    public $hrg_jual;
    public $qty;
    public $sub_total;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getSellDetails(){
        $sqlQuery = "SELECT id, kd_brg, trxid, nm_brg, hrg_jual, qty, sub_total FROM ". $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createSellDetail(){
        if($this->checkStock()){
            $sqlQuery = "INSERT INTO ". $this->db_table ."
            SET
            kd_brg = :kd_brg,
            trxid = :trxid,
            nm_brg = :nm_brg,
            hrg_jual = :hrg_jual,
            qty = :qty,
            sub_total = :sub_total";
            $stmt = $this->conn->prepare($sqlQuery);
            // sanitize
            $this->kd_brg=htmlspecialchars(strip_tags($this->kd_brg));
            $this->trxid=htmlspecialchars(strip_tags($this->trxid));
            $this->nm_brg=htmlspecialchars(strip_tags($this->nm_brg));
            $this->hrg_jual=htmlspecialchars(strip_tags($this->hrg_jual));
            $this->qty=htmlspecialchars(strip_tags($this->qty));
            $this->sub_total=htmlspecialchars(strip_tags($this->sub_total));
            // bind data
            $stmt->bindParam(":kd_brg", $this->kd_brg);
            $stmt->bindParam(":trxid", $this->trxid);
            $stmt->bindParam(":nm_brg", $this->nm_brg);
            $stmt->bindParam(":hrg_jual", $this->hrg_jual);
            $stmt->bindParam(":qty", $this->qty);
            $stmt->bindParam(":sub_total", $this->sub_total);
            if($stmt->execute()){
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
    // READ single
    public function checkStock(){
        $sqlQuery = "SELECT
        id,
        kd_brg,
        stock 
        FROM
        ". $this->dbm_table ."
        WHERE
        kd_brg = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->kd_brg);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->kd_brg = $dataRow['kd_brg'];
        $stock = $dataRow['stock'];
        $saldo = $stock + $this->qty;
        if($saldo < 0 ){
            return false;
        }else{   
            $this->updateStock($saldo);
            return true;
        }
    }

    public function updateStock($saldo){
        $sqlQuery = "UPDATE
        ". $this->dbm_table ."
        SET
        stock = :stock 
        WHERE
        kd_brg = :kd_brg";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":kd_brg", $this->kd_brg);
        $stmt->bindParam(":stock", $saldo);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function setDecrease(){
        $sqlQuery = "SELECT
        id,
        kd_brg,
        trxid,
        nm_brg,
        hrg_jual,
        qty,
        sub_total
        FROM
        ". $this->db_table ."
        WHERE
        trxid = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dataRow;
    }

    function deleteDetails(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE trxid = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->trxid=htmlspecialchars(strip_tags($this->trxid));
        $stmt->bindParam(1, $this->trxid);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
}
?>