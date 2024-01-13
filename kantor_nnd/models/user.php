<?php
class user{
// Connection
private $conn;
// Table
private $db_table = "user";
// Columns
public $id;
public $fullname;
public $email;
public $password;
public $roll;
public $created;
// Db connection
public function __construct($db){
$this->conn = $db;
}
// GET ALL
public function getuser(){
$sqlQuery = "SELECT id, fullname, email, password, roll, created FROM "
. $this->db_table . "";
$stmt = $this->conn->prepare($sqlQuery);
$stmt->execute();
return $stmt;
}
// CREATE
public function createuser (){
$sqlQuery = "INSERT INTO
". $this->db_table ."
SET
fullname = :fullname, 
email = :email, 
password = :password, 
roll = :roll, 
created = :created";
$stmt = $this->conn->prepare($sqlQuery);
// sanitize
$this->fullname=htmlspecialchars(strip_tags($this->fullname));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->roll=htmlspecialchars(strip_tags($this->roll));
$this->created=htmlspecialchars(strip_tags($this->created));
// bind data
$stmt->bindParam(":fullname", $this->fullname);
$stmt->bindParam(":email", $this->email);
$stmt->bindParam(":password", $this->password);
$stmt->bindParam(":roll", $this->roll);
$stmt->bindParam(":created", $this->created);
if($stmt->execute()){
return true;
}
return false;
}
// READ single
public function getSingleuser(){
$sqlQuery = "SELECT
id, 
fullname, 
email, 
password, 
roll, 
created
FROM
". $this->db_table ."
WHERE 
id = ?
LIMIT 0,1";
$stmt = $this->conn->prepare($sqlQuery);
$stmt->bindParam(1, $this->id);
$stmt->execute();
$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
$this->fullname = $dataRow['fullname'];
$this->email = $dataRow['email'];
$this->password = $dataRow['password'];
$this->roll = $dataRow['roll'];
$this->created = $dataRow['created'];
} 
// UPDATE
public function updateuser(){
$sqlQuery = "UPDATE ". $this->db_table ."
SET
fullname = :fullname, 
email = :email, 
password = :password, 
roll = :roll, 
created = :created
WHERE 
id = :id";

$stmt = $this->conn->prepare($sqlQuery);

$this->fullname=htmlspecialchars(strip_tags($this->fullname));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->roll=htmlspecialchars(strip_tags($this->roll));
$this->created=htmlspecialchars(strip_tags($this->created));
$this->id=htmlspecialchars(strip_tags($this->id));

// bind data
$stmt->bindParam(":fullname", $this->fullname);
$stmt->bindParam(":email", $this->email);
$stmt->bindParam(":password", $this->password);
$stmt->bindParam(":roll", $this->roll);
$stmt->bindParam(":created", $this->created);
$stmt->bindParam(":id", $this->id);
if($stmt->execute()){
return true;
}
return false;
}

// DELETE
function deleteuser(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
$stmt = $this->conn->prepare($sqlQuery);
$this->id=htmlspecialchars(strip_tags($this->id));
$stmt->bindParam(1, $this->id);
if($stmt->execute()){
return true;
}
return false;
}
public function prosesLogin(){
    $sqlQuery = "SELECT
    id, 
    fullname, 
    email, 
    password, 
    roll, 
    created
    FROM
    ". $this->db_table ."
    WHERE 
    email = :email AND
    password = :password
    LIMIT 0,1";
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->bindParam(":email",$this->email);
    $stmt->bindParam(":password",$this->password);
    $stmt->execute();
    $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($dataRow)){
            return $dataRow;
         }else{
            return false;
         }
     } 
     public function prosesLogout(){
        session_start();
        session_unset();
        session_destroy();
        return true;
     }
  }   
?>