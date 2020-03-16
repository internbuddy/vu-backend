<?php
 
// get database connection
include_once 'database.php';
 
// instantiate user object
include_once 'schedule.php';
header('Content-Type: application/json');
header('Access-Control-Request-Method: POST');
error_reporting(0);

$database = new Database();
$db = $database->getConnection();
 
$user = new Student($db);

 if(!empty($_POST['name'] && $_POST['contact'] && $_POST['email'] && $_POST['date'] && $_POST['time'] && $_POST['student_id'] && $_POST['campus_id'] )){
// set user property values
$user->name = $_POST['name'];
$user->contact = $_POST['contact'];
$user->email = $_POST['email'];
$user->date = $_POST['date'];
$user->time = $_POST['time'];
$user->student_id = $_POST['student_id'];
$user->campus_id = $_POST['campus_id'];

 if($stmt= $user->schedule()){
    echo json_encode(array("status" => "success", "message" => "Scheduling Interview request is submitted Successfully."));
}
 
    else{
       echo json_encode(array("status" => "failed", "message" => "Interview Scheduling request not submitted."));
        }
}
else{
	 echo json_encode(array("status" => "failed", "message" => "Please Fill all the required details"));
}

?>