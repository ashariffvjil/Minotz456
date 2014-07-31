<?php	
    class Webservices extends CI_Model
	{
	
	function load($method)
	{
	
	return $this->$method();
	}
	
	function signin()
	{
	$username=$this->input->post('username');
	$password=$this->input->post('password');
	return json_encode($this->user->checkLogin($username, $password));
	}
	
	 function getCountries()
        {
            return json_encode($this->user->getCountries());
		}
	 
	 function getOccupations()
        {
		return json_encode($this->user->getOccupations());
	
		}
	 function signup()
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$country_id = $this->input->post('country_id');
			$zipcode = $this->input->post('zipcode');
			$occupation_id = $this->input->post('occupation_id');
			
			$result=$this->user->signup($first_name,$last_name,$country_id,$zipcode,$occupation_id,$username,$email,$password,3);
			echo json_encode($result);
		}
	
    function getAppointments()
    	{
  			$docUserID=$this->input->post('doc_userID');
			return json_encode($this->user->getAppointments($docUserID));
    	} 
	function forgotPassword()
		{
			$email=$this->input->post('email');
			return json_encode($this->user->forgotPassword($email));
		}
	function getDemographicsInfo()
		{
			$patientID = $this->input->post('patient_ID');			
			return json_encode($this->user->getDemographicsInfo($patientID));
		}			

	}
	?>