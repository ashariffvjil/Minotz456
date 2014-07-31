<?php
/*
    Copyright (C) 2008-2011 Sergey Tsalkov (stsalkov@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

class Minotz {

 /* Registration Method */

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
public function registration($first_name,$last_name,$country_id,$zipcode,$occupation_id,$username,$email,$password)
	 {
	 	global $mw;
	    $password=$this->password_encrypt($password);
	   
	    $queryEmail =  $mw->query("call getUserdetailsByEmail('".$email."')");
	   	    
		if($queryEmail->num_rows() == 1)
	     {
	      $result= array('status'=>0, 'msg' =>'Email Already Exists');
	      return $result;
	     }
	   
	    $queryUsername =  $mw->query("call getUserdetailsByUsername('".$username."')");
	 	 
	   if($queryUsername->num_rows() == 1)
	     {
	      $result= array('status'=>0, 'msg' =>'Username Already Exists');
		  return $result;
	     }
	   $query =  $mw->query("call saveUser('".$first_name."','".$last_name."','".$country_id."','".$zipcode."','".$occupation_id."','".$username."','".$email."','".$password."')");
	 	
		if($query->num_rows() == 1)
		  {
		   $result = array('status'=>1, 'msg' => 'Registered Successfully');
		   return $result;
		  }
        if($result) 
		  {
			echo json_encode($result);
			
		  }
	 }	 
	 

/* Registration Method Ends */

/* Signin Method  */

public function signin($email,$password)
	{
     	global $mw;
		$querySignin = $mw->query("call checkLogin('".$email."', '".$password."')");
		if($querySignin->numRows() == 1)
	     {
	            $result = array('status'=>1, 'msg' => 'Signin Successful');
	     		return $result;
	     }
		else
		 {
		  		$result = array('status'=>0, 'msg' => 'Invalid Email or Passowrd');
		        return $result;
		 }
		
			if($result) 
			{
			echo json_encode($result);
		    }
	}	

/* Signin Method Ends */

/* Forgot Password Method */

function rand_password( $length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) {
    return substr( str_shuffle( $chars ), 0, $length );
   }

public function forgotpassword($email)
      {
        global $mw;
		$queryForgotpassowrd = $mw->query("call forgotPassword('".$email."')");
		
      }
/* Forgot Password Method Ends*/


/* InboxView Method */
public function inboxview($userid)
      {
     	global $mw;
		$patient_details = array();
		$queryInboxview = $mw->query("call getInboxview('".$userid."')");
		if($queryInboxview->numRows() > 0) {
            while ($patient = mysql_fetch_assoc($queryInboxview))
			     {
                   $patient_details[] = $patient;
			      }
               $result =  array('status'=>1, "patientdetails" => $patient_details);
			   return $result;
	       }
          
       else {
	   
	           $result = array('status'=>0, 'msg' => 'Invalid Userid');
		       return $result;
            }
       if($result) 
			{
			echo json_encode($result);
		    }
	  }
/* Inboxview Method Ends */

/* Filter Patients by Date Method */

public function inboxbydate($userid, $date)
     {
	     global $mw;
		$patient_details = array();
		$queryInbox = $mw->query("call getInboxbydate('".$userid."', '".$date."')");
		if($queryInbox->numRows() > 0) {
            while ($patient = mysql_fetch_assoc($queryInbox))
			     {
                   $patient_details[] = $patient;
			      }
               $result =  array('status'=>1, "patientdetails" => $patient_details);
			   return $result;
	       }
          
       else {
	   
	           $result = array('status'=>0, 'msg' => 'Invalid Userid');
		       return $result;
            }
       if($result) 
			{
			echo json_encode($result);
		    }
 
     }
/* Filter Patients by Date Method ends*/

/* Filter Patients by patient name or id Method */
 
 public function inboxbyname($userid, $patientname, $patientid)
     {
	     global $mw;
		$patient_details = array();
		$queryInbox = $mw->query("call getInboxbyname('".$userid."', '".$patientname."', '".$patientid."')");
		if($queryInbox->numRows() > 0) {
            while ($patient = mysql_fetch_assoc($queryInbox))
			     {
                   $patient_details[] = $patient;
			      }
               $result =  array('status'=>1, "patientdetails" => $patient_details);
			   return $result;
	       }
          
       else {
	   
	           $result = array('status'=>0, 'msg' => 'Invalid Userid');
		       return $result;
            }
       if($result) 
			{
			echo json_encode($result);
		    }
 
     }
/* Demographics Method*/

public function demographics($patientid)
     {
           global $mw;
		   $patient_info = array();
		   $queryDemographics = $mw->query("call getDemographicsInfo('".$patientid."')");
		   if($queryDemographics->numRows() > 0) {
		          while($patient = mysql_fetch_assoc($queryDemographics))
				  {
				    $patient_info[] = $patient;
			 	  }
				 
				 $result =array('status' =>1, "patientInfo" => $patient_info);
				 return $result;
			  }
		   else {
		   
		         $result = array('status' => 0, 'msg' => 'Invalid Patientid');	  
				 return $result;
				}
		 if($result)
		     {
			 echo json_encode($result);
			 }
	 }		 
			 
		    
	}

?>



