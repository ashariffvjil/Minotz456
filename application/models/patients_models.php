<?php
class patients_models extends CI_Model
{
	function savepatient($userid,$first_name,$last_name,$dob,$gender,$hospital_mrn,$nhs_number,$shortinfo,$address,$address1,$city,$state,$zipcode,$country,$phone,$photo_path)
	{
		$query =  $this->db->query("call savePatient('".$userid."','".$first_name."','".$last_name."','".$dob."','".$gender."','".$hospital_mrn."','".$nhs_number."','".$shortinfo."','".$address."','".$address1."','".$city."','".$state."','".$zipcode."','".$country."','".$phone."','".$photo_path."')");
		if($query)
		{
			return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	}
	function getPatients()
	{
		$query = $this->db->query('call getPatients()');
	    return $query->result();
	}
	function getDoctors()
	{
		 $this->db->reconnect();
		$query = $this->db->query('call getDoctors()');
	    return $query->result();
	}
	function getlogxs()
	{
		 $this->db->reconnect();
		$query = $this->db->query('call getlogx()');
	    return $query->result();
	}
	function saveappointment($userid,$patient_name,$doctor_name,$logx_name,$doa,$referred_by,$note)
	{
		$query =  $this->db->query("call saveAppointment('".$userid."','".$patient_name."','".$doctor_name."','".$logx_name."','".$doa."','".$referred_by."','".$note."')");
		if($query)
		{
			return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	
	}
	
}
	?>