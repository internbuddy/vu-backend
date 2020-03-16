<?php
class Student{
 
    // database connection and table name
    private $conn;
    private $table_name = "schedule_interview";
 
    // object properties
    public $id;
    public $name;   
    public $contact;
    public $email;
    public $date;
    public $time;
    public $student_id;
    public $campus_id;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function schedule(){
    
        
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, contact_no=:contact, email=:email, date=:date, time=:time, student_id=:student_id, campus_id=:campus_id";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->student_id=htmlspecialchars(strip_tags($this->student_id));
        $this->campus_id=htmlspecialchars(strip_tags($this->campus_id));
        
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":student_id", $this->student_id);
        $stmt->bindParam(":campus_id", $this->campus_id);
    

        //  $stmt->execute();
        // return $stmt;
    
        // execute query
         if($stmt->execute()){
        
        return true;
    }
    
    return false;
     
    }

    // login user
    
    }