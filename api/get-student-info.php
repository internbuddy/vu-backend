<?php
include("config/connection.php");
$result=mysqli_query($conn,"select * from vu_student__master where where status=1");
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
	  		$status = $row['status'];
	}  
}
$dictionary = array("status"=>$status,"msg"=>$msg,"data"=>$data,"id"=>$id,"name"=>$name,"email"=>$email,"f_m_name"=>$f_m_name,"dob"=>$dob, "mobile"=>$mobile, "ug_qual"=>$ug_qual,"cgpa"=>$cgpa, "reg_date_time"=>$reg_date_time, "status"=>$status);
echo json_encode($dictionary);	  		
