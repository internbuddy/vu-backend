<?php
class Student{
  
    // database connection and table name
    private $conn;
    private $table_name = "vu_student";
  
    // object properties
    public $id;
    public $name;
    public $email;
    public $f_m_name;
    public $dob;
    public $mobile;
    public $ug_qual;
    public $cgpa;
    public $reg_date_time;
    public $status;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
  
    // read products
    public function getStudentDetails(){
  
        // select all query
        $query = "SELECT * FROM  " . $this->table_name . " ";
  
        // prepare query statement
        $stmt = $this->conn->prepare($query);
  
        // execute query
        $stmt->execute();
      return $stmt;
      }
}
?>
