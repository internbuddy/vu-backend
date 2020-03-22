<?php
 
// get database connection
include_once 'config/database.php';

 // instantiate user object
include_once 'objects/campus.php';
header('Content-Type: application/json');
header('Access-Control-Request-Method: POST');
error_reporting(0);

$database = new Database();
$db = $database->getConnection();
 
$user = new Campus($db);
 if($stmt= $user->campus_details()){
 	$num = $stmt->rowCount();             
          
     if($num>0){
          $campus_arr=array();
          $campus_arr["status"] = "success";
	        $campus_arr["message"] = "Campus data fetched";
	        $campus_arr["data"]=array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $campus=array(
                 "campus_id" => $row['campus_id'],
                 "campus_name"=> $row['campus_name'],
                 "campus_image" => $row['campus_image'],
                 "campus_status" => $row['campus_status'],
                 "campus_longitude"=> $row['campus_longitude'],
                 "campus_latitude"=> $row['campus_latitude']
            );

             array_push($campus_arr["data"], $campus);
        }
   
        echo json_encode($campus_arr);
    } else{
        echo json_encode(
            array("status" => "failed","message" => "No campus data found.")
        );
    }          
} 
    else{
       echo json_encode(array("status" => "failed", "message" => "No data found."));
        }


?>
