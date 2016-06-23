<?php
class Device{
 
    // database connection and table name
    private $conn;
    private $table_name = "device";
 
    // object properties
    public $id;
    public $deviceID;
    public $wpName;
    public $msisdn;
    public $address;
    public $status;
    public $merchantid;
    public $kategoriid;
    public $timestamp;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        // to get time-stamp for 'created' field
        $this->getTimestamp();
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    deviceID = ?, msisdn = ?, address = ?, status = 1, merchantid = ?, kategoriid = ?, creationtime = ?";
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->deviceID);
        $stmt->bindParam(2, $this->msisdn);
        $stmt->bindParam(3, $this->address);
        $stmt->bindParam(4, $this->merchantid);
        $stmt->bindParam(5, $this->kategoriid);
        $stmt->bindParam(6, $this->timestamp);
 
        if($stmt->execute()){
            return true;
        }else{
            return $this->conn->errorInfo();
        }
 
    }

    // used for the 'created' field when creating a product
    function getTimestamp(){
        date_default_timezone_set('Asia/Jakarta');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function readAll($page, $from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, username, level
                FROM
                    " . $this->table_name . "
                ORDER BY
                    username ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    // used for paging products
    public function countAll(){
     
        $query = "SELECT id FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readOne(){
 
        $query = "SELECT
                    username, password, level
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->level    = $row['level'];  


    }

    function update(){
 
        $this->getTimestamp();

        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    deviceid = :deviceid,
                    msisdn = :msisdn,
                    merchantid = :merchantid,
                    kategoriid = :kategoriid,                                        
                    address = :address
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $stmt->bindParam(':deviceid', $this->deviceID);
        $stmt->bindParam(':msisdn', $this->msisdn);
        $stmt->bindParam(':merchantid', $this->merchantid);
        $stmt->bindParam(':kategoriid', $this->kategoriid);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function updatePassword(){
 
        $this->getTimestamp();

        echo $this->password . "-" . $this->id . "==";

        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    password = :password,
                    updatedtime = :updatedtime
                WHERE
                    id_login = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':updatedtime', $this->timestamp);
        $stmt->bindParam(':id', $this->id);

        $stmt->debugDumpParams();
     
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }    

    // delete the product
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function checkExists($deviceid, $merchantid) {
        $query = "SELECT
                    id
                FROM
                    " . $this->table_name . "
                WHERE
                    deviceid = ? AND merchantid = ?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $deviceid);
        $stmt->bindParam(2, $merchantid);

        // execute the query
        if($stmt->execute()){
            $this->count = $stmt->rowCount();
            if ($this->count > 0) {
                return true;     
            } else {
                return false;
            }             
        }else{
            return false;
        }        
    }

    function checkExistsDiffId($name_to_check, $id) {
        $query = "SELECT
                    id
                FROM
                    " . $this->table_name . "
                WHERE
                    deviceID = ? and id <> ? ";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $name_to_check);
        $stmt->bindParam(2, $id);

        // execute the query
        if($stmt->execute()){
            $this->count = $stmt->rowCount();
            if ($this->count > 0) {
                return true;     
            } else {
                return false;
            }             
        }else{
            return false;
        }        
    }


}
?>