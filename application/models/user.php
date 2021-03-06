<?php
class user extends CI_Model
	{
		 
	 function password_encrypt($password)
	 {
	 $salt=rand(9999,99999);
	 $str=$password.$salt;
	 $pwd=do_hash($str, 'md5');
	 return $pwd.':'.$salt;
	 }
	 
	 function password_decrypt($password,$salt)
	 {
	 $str=$password.$salt;
	 $pwd=do_hash($str, 'md5');
	 return $pwd.':'.$salt;
	 }
	 function rand_password( $length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) 
	 {
     return substr( str_shuffle( $chars ), 0, $length );
 	 }
	 function getCountries()
        {
            $query = $this->db->query('call getCountries()');

           return $query->result();
        }
	 
	 function getOccupations()
        {
            $this->db->reconnect();
			$query = $this->db->query('call getOccupations()');

           return $query->result();
        }
	
	 function checkLogin($username, $password)
	 {
	  
	   $queryUsername =  $this->db->query("call getUserdetailsByUsername('".$username."')");
	 	
	  
	  if($queryUsername->num_rows() <=0)
	   {
	       return array('st'=>0, 'msg' => 'Invalid User Name & Password');
	   }
	   
	  $result=$queryUsername->row_array();
	  $this->db->reconnect();
	  
	  $salt=explode(':',$result['password']);
	  $new_password=$this->password_decrypt($password,$salt[1]);  
	
	
	   if($result['password']!=$new_password)
	   {
	       return array('st'=>0, 'msg' => 'Invalid User Name & Password');
	    
	   }
	   		$result['st']=1;
	     return $result;
	   
	 }
	 
	 function signup($first_name,$last_name,$country_id,$zipcode,$occupation_id,$username,$email,$password,$user_role)
	 {
	   $password=$this->password_encrypt($password);
	   
	   if($first_name==''&&$last_name==''&&$country_id==''&&$zipcode==''&&$occupation_id==''&&$username==''&&$email==''&&$password)
	    return array('st'=>0, 'msg' =>'Invalid Details');
	   
	   
	    $queryEmail =  $this->db->query("call getUserdetailsByEmail('".$email."')");
	   $this->db->reconnect();
	    
		if($queryEmail->num_rows() == 1)
	   {
	   $result= array('st'=>0, 'msg' =>'Email Already Exists');
	   return $result;
	   }
	   
	     $queryUsername =  $this->db->query("call getUserdetailsByUsername('".$username."')");
	 	 $this->db->reconnect();
	   if($queryUsername->num_rows() == 1)
	   {
	    $result= array('st'=>0, 'msg' =>'Username Already Exists');
		 return $result;
	   }
	   $flag=0;
	
	   $query =  $this->db->query("call saveUser('".$first_name."','".$last_name."','".$country_id."','".$zipcode."','".$occupation_id."','".$username."','".$email."','".$password."','".$user_role."')");
	 	
		   if($query->num_rows() == 1)
		   {
		   
			 $this->session->set_userdata($query->result_array());
			  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		   }
		   else
		   {
		      return array('st'=>0, 'msg' =>'Invalid Details');
		   }
	
	  
	 }
	 
	function getAppointments($docUserID)
		{ 
		
		 $query =  $this->db->query("CALL getAppointments('".$docUserID."')");
		 return $query->result_array();
		} 
	function forgotPassword($email)
	    {
		  $query = $this->db->query("CALL forgotPassword('".$email."')");
		  return $query->result_array();
	    }
	function getDemographicsInfo($patientID) 
		{
		  $query=$this->db->query("CALL getDemographicsInfo('".$patientID."')");
		  return $query->result_array();
	  	} 
	}
	?>