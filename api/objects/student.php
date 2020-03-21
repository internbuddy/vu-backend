<?php
class Student{
  
    // database connection and table name
    private $conn;
    private $table_name = "vu_student";
  
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
?>