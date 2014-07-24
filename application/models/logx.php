<?php
class logx extends CI_Model
{
	 function logx($name)
	 {
		
	   $query =  $this->db->query("call savelogx('".$name."')");
	 	
		   if($query->num_rows() == 1)
		   {
			  return array('msg' =>'Submit Sucessfully');
		   }
	   }
	  
	 }
	 
	}
	?>