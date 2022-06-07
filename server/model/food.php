<?php
//include_once('../../config/db_connect.php');
class Food{
    private $id;
    private $foodName;
    private $categoryId;
    private $price;
    private $foodDescription;
    private $foodImage;
    private $createDate;
    private $updateDate;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getFoodList() {
        $query = "SELECT * FROM food";
        $stmt =  $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
    public function getFoodById($id) {
        $query = "SELECT * FROM food WHERE id = " . $id;
        $stmt = $this->conn->prepare($query);
        //$stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt;
    }
    public function getFoodByCategoryId($categoryId) {
        $query = "SELECT * FROM food WHERE categoryId = " . $categoryId;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
?>
