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
      $dob = $row2['dob'];
	}  
}
}

`vu_student_master` (`id`, `name`, `email`, `f_m_name`, `dob`, `mobile`, `ug_qual`, `cgpa`, `reg_date_time`, `status`)
$dictionary = array("status"=>$status,"msg"=>$msg,"data"=>$data,"patient_name"=>$patient_name,"patient_age"=>$patient_age,"patient_gender"=>$patient_gender,"person_id"=>$person_id);
echo json_encode($dictionary);	  		
