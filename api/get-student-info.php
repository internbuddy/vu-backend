<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3000");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
error_reporting(0);

include("config/connection.php");
$result=mysqli_query($conn,"select * from vu_student_master where is_active='1'");
$data = array();
$count=mysqli_num_rows($result);
if($count==0)
{
		$msg= "Patient Not Found";
		$status=0;
		$data="NA";
}
else
{
  while ($row = mysqli_fetch_assoc($result))
 	{
			$status=1;
			$msg="Success";
			$data[]=$row;
			$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$f_m_name = $row['f_m_name'];
			$dob = $row['dob'];
	  		$mobile = $row['mobile'];
	  		$ug_qual = $row['ug_qual'];
	  		$cgpa = $row['ug_qual'];
	  		$reg_date_time = $row['reg_date_time'];
	  		$is_active = $row['is_active'];
	}  
}
$dictionary = array("status"=>$status,"msg"=>$msg,"data"=>$data);
echo json_encode($dictionary);	  		
