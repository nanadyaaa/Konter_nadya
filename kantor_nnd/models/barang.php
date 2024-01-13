<?php
class Barang{
    // Connection
    private $conn;
    // Table
    private $db_table = "barang";
    // Columns
    public $id;
    public $kd_brg;
    public $nm_brg;
    public $hrg_brg;
    public $stock;
    public $jenis_brg;
    public $hrg_beli;
    // Db connection
    public function __construct($db){
    $this->conn = $db;
    }
    // GET ALL
    public function getBarangs(){
    $sqlQuery = "SELECT id, kd_brg, nm_brg, hrg_brg, stock, jenis_brg, hrg_beli  FROM ". $this->db_table . "";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
    }
    // CREATE
    public function createBarangs(){
        $sqlQuery = "INSERT INTO ". $this->db_table ."
        SET
        kd_brg = :kd_brg,
        nm_brg = :nm_brg,
        hrg_brg = :hrg_brg,
        stock = :stock,
        jenis_brg = :jenis_brg,
        hrg_beli = :hrg_beli";
        $stmt = $this->conn->prepare($sqlQuery);
            // sanitize
            $this->kd_brg=htmlspecialchars(strip_tags($this->kd_brg));
            $this->nm_brg=htmlspecialchars(strip_tags($this->nm_brg));
            $this->hrg_brg=htmlspecialchars(strip_tags($this->hrg_brg));
            $this->stock=htmlspecialchars(strip_tags($this->stock));
            $this->jenis_brg=htmlspecialchars(strip_tags($this->jenis_brg));
            $this->hrg_beli=htmlspecialchars(strip_tags($this->hrg_beli));
            // bind data
        $stmt->bindParam(":kd_brg", $this->kd_brg);
        $stmt->bindParam(":nm_brg", $this->nm_brg);
        $stmt->bindParam(":hrg_brg", $this->hrg_brg);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":jenis_brg", $this->jenis_brg);
        $stmt->bindParam(":hrg_beli", $this->hrg_beli);
        if($stmt->execute()){
        return true;
        }
        return false;
        }
        // READ single
        public function getSingleBarangs(){
        $sqlQuery = "SELECT
        id,
        kd_brg,
        nm_brg,
        hrg_brg,
        stock,
        jenis_brg,
        hrg_beli
        
        FROM
        ". $this->db_table ."
        WHERE
        id = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->kd_brg = $dataRow['kd_brg'];
        $this->nm_brg = $dataRow['nm_brg'];
        $this->hrg_brg = $dataRow['hrg_brg'];
        $this->stock = $dataRow['stock'];
        $this->jenis_brg = $dataRow['jenis_brg'];
        $this->hrg_beli = $dataRow['hrg_beli'];
        }
        // UPDATE
        public function updateBarangs(){
        $sqlQuery = "UPDATE
        ". $this->db_table ."
        SET
        kd_brg = :kd_brg,
        nm_brg = :nm_brg,
        hrg_brg = :hrg_brg,
        stock = :stock,
        jenis_brg = :jenis_brg,
        hrg_beli = :hrg_beli
        WHERE
        id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->kd_brg=htmlspecialchars(strip_tags($this->kd_brg));
        $this->nm_brg=htmlspecialchars(strip_tags($this->nm_brg));
        $this->hrg_brg=htmlspecialchars(strip_tags($this->hrg_brg));
        $this->stock=htmlspecialchars(strip_tags($this->stock));
        $this->jenis_brg=htmlspecialchars(strip_tags($this->jenis_brg));
        $this->hrg_beli=htmlspecialchars(strip_tags($this->hrg_beli));
        $this->id=htmlspecialchars(strip_tags($this->id));
        // bind data
        $stmt->bindParam(":kd_brg", $this->kd_brg);
        $stmt->bindParam(":nm_brg", $this->nm_brg);
        $stmt->bindParam(":hrg_brg", $this->hrg_brg);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":jenis_brg", $this->jenis_brg);
        $stmt->bindParam(":hrg_beli", $this->hrg_beli);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()){

            return true;
                }
            return false;
            }
            // DELETE
            function deleteBarangs(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->id=htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(1, $this->id);
            if($stmt->execute()){
            return true;
            }
         return false;
        }
    }
?>
