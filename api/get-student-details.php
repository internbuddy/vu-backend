<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

echo "Header Set. \n";
// database connection will be here
// include database and object files
include_once './config/database.php';
include_once './objects/student.php';

echo "Database included.\n";

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$student = new Student($db);
  
// read products will be here
// query products
$stmt = $student->getStudentDetails();
  
// products array
$students_arr=array();
$students_arr["records"]=array();
  
// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $student_record=array(
    "id" => $id,
    "name" => $name,
     "email" => $email,
     "f_m_name" => $f_m_name,
     "dob" => $dob,
     "mobile" => $mobile,
      "ug_qual" => $ug_qual,
      "cgpa" => $cgpa,
      "reg_date_time" => $reg_date_time,
      "status" => $status
   );
array_push($students_arr["records"], $student_record);
}
// show products data in json format
echo json_encode($students_arr);
?>
