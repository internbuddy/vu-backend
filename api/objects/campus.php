<?php
class Campus{
 
    // database connection and table name
    private $conn;
    private $table_name = "vu_campus_master";
 
    // object properties
    public $campus_id;
    public $campus_name;   
    public $campus_image;
    public $campus_status;
    public $campus_longitude;
    public $campus_latitude;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }  
    function campus_details(){   
              
        // query to fetch records
        $query = "SELECT * FROM
                    " . $this->table_name ;    
        // prepare query
        $stmt = $this->conn->prepare($query);

         if($stmt->execute()){
           
        return $stmt;
    }
    
    return false;
     
    }   
    }
