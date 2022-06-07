<?php
include_once('../../config/db_connect.php');
class Customer extends db{
    private $id;
    private $fullName;
    private $email;
    private $phone;
    private $address;
    private $sex;
    private $username;
    private $password;
    private $token;
    private $createDate;
    private $updateDate;

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getCustomerList() {
        $stmt = $this->conn->prepare("SELECT * FROM customer");
        $stmt->execute();
        
        return $stmt;
    }
    public function getCustomerById(){
        
    }
    
}
?>
