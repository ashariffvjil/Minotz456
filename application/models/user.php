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
	 function signup($username,$email,$password)
	 {
	   $password=$this->password_encrypt($password);
	   
	    $queryUsername =  $this->db->query("call getUserdetailsByUsername('".$username."')");
	 	 $this->db->reconnect();
	   if($queryUsername->num_rows() == 1)
	   {
	    $result= array('st'=>0, 'msg' =>'Username Already Exists');
		 return $result;
	   }
	 
	   $queryEmail =  $this->db->query("call getUserdetailsByEmail('".$email."')");
	   $this->db->reconnect();
	    
		if($queryEmail->num_rows() == 1)
	   {
	   $result= array('st'=>0, 'msg' =>'Email Already Exists');
	   return $result;
	   }
	   
	  
	   $query =  $this->db->query("call saveUser('".$username."','".$email."','".$password."')");
	 	
		   if($query->num_rows() == 1)
		   {
		   
			 $this->session->set_userdata($query->result_array());
			  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		   }
	
	  
	 }
	 
	}
	?>