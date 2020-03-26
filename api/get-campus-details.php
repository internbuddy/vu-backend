<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
error_reporting(0);

include("config/connection.php");
$result=mysqli_query($conn,"select * from vu_campus_master");
$data = array();
$count=mysqli_num_rows($result);

if($count>0){
	 while ($row = mysqli_fetch_assoc($result))
 	{
		 $data[]=$row;
			$campus_id = $row['campus_id'];
			$campus_name = $row['campus_name'];
			$campus_image = $row['campus_image'];
			$campus_status = $row['campus_status'];
			$campus_longitude = $row['campus_longitude'];
	  		$campus_latitude = $row['campus_latitude'];
		 
	 }
	
	$dictionary = array("status"=>'1',"msg"=>'succeess',"data"=>$data);
}else{
		$status=0;
		$msg= "No Data Found";		
		$data="NA";
	
	$dictionary = array("status"=>$status,"msg"=>$msg,"data"=>$data);
}
return json_encode($dictionary);	  
