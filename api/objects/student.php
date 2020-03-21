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
function getDetails(){
  
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
}
?>
