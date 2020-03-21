<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once 'config/database.php';
include_once 'objects/student.php';
  
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
// extract row
// this will make $row['name'] to
// just $name only
extract($row);
$product_item=array(
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
array_push($students_arr["records"], $product_item);
}
// set response code - 200 OK
http_response_code(200);

// show products data in json format
echo json_encode($products_arr);
?>
