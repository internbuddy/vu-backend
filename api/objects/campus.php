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
    // signup user
    function get_campus_details(){
    
        
        // query to insert record
        $query = "SELECT * FROM 
                    " . $this->table_name . ";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
   
      
    
        // execute query
         if($stmt->execute()){      
            return $stmt;      
      
    }
    
    return false;
     
    }

    // login user
    
    }
