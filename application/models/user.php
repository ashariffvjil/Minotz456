<?php
class user extends CI_Model
	{
	
	 function login($username, $password)
	 {
	   $this -> db -> select('users_id, users_name, password');
	   $this -> db -> from('users');	   $this -> db -> where('users_name', $username);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	 }
	 
	 function password_encrypt($password)
	 {
	 $salt=rand(9999,99999);
	 $str=$password.$salt;
	 $pwd=do_hash($str, 'md5');
	 return $pwd.':'.$salt;
	 }
	 
	 
	 function signup($username,$email,$password)
	 {
	   $password=$this->password_encrypt($password);
	   
	   $queryEmail =  $this->db->query("call getUserdetailsByEmail('".$email."')");
	   
	   $queryUsername =  $this->db->query("call getUserdetailsByUsername('".$username."')");
	    
		if($queryEmail->num_rows() == 1)
	   {
	   $result= array('st'=>0, 'msg' =>'Email Already Exists');
	   return $result;
	   }
	   else if($queryUsername->num_rows() == 1)
	   {
	    $result= array('st'=>0, 'msg' =>'Username Already Exists');
		 return $result;
	   }
	  else 
	  {
	   $query =  $this->db->query("call saveUser('".$username."','".$email."','".$password."')");
	 	
		   if($query->num_rows() == 1)
		   {
		   
			 $this->session->set_userdata($query->result_array());
			  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		   }
	   }
	  
	 }
	 function getCountries()
	{
		$query = $this->db->query('call getCountries()');
	    return $query->result();
	}
	
	 
	
	 
}
	?>