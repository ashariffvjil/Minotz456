<?php
class patientsmodel extends CI_Model
{
	function savepatient($userid,$first_name,$last_name,$dob,$gender,$hospital_mrn,$nhs_number,$shortinfo,$address,$address1,$city,$state,$zipcode,$country,$phone,$photo_path)
	{
		$query =  $this->db->query("call savePatient('".$userid."','".$first_name."','".$last_name."','".$dob."','".$gender."','".$hospital_mrn."','".$nhs_number."','".$shortinfo."','".$address."','".$address1."','".$city."','".$state."','".$zipcode."','".$country."','".$phone."','".$photo_path."')");
		if($query)
		{
			return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	
		
	}
}
	?>