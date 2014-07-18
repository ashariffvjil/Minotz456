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
include ("includes/lib/class.simpleImage.php");

class Minotz {
  // initial connection
 /* Registration Method */
public function registration($name,$image,$street,$province,$town,$pincode,$mobilenumber,$emailid,$password,$somethingaboutmyself,$user_id)
	{
			global $mw;
			
			$photo=$name."_".rand(99,9999).".png";
			$thefile = base64_decode($image);  
			
			
			if($image != '')  
			{
				file_put_contents('images/users/'.$photo,$thefile);
				$image = new SimpleImage();
			    $image->load('images/users/'.$photo);
			    $image->resize(100,100);
			    $image->save('images/users/'.$photo);
			}
			$data=array( 'name'			=>	$name,
						 'photo'		=>	$photo, 
						 'mobile'		=>	$mobilenumber,
						 'email'		=>	$emailid,
						 'password'		=>	$password,
						 'description'	=>	$somethingaboutmyself
					   );
								
			if($user_id==0)
			{
				$mw->insert('mw_user' , $data);
				$user_id=$mw->insertId();
				$data1=array('user_id'	=>	$user_id,
							 'street'	=>	$street, 
							 'provience'=>	$province,
							 'town'		=>	$town,
							 'zipcode'	=>	$pincode,
							 'primary_address' => '1'
						 );
				$mw->insert('mw_address' , $data1);
			$data2=array('user_id'	=>	$user_id,'name'=>'excellent','title'=>'excellent');	
			$mw->insert('mw_title' , $data2);
			}
			else 
			{
			$mw->update('mw_user' , $data, "id=%d", $user_id);
			$data1=array( 'street'	=>	$street,'provience'=>	$province, 'town'		=>	$town,'zipcode'=>$pincode );
				$mw->insert('mw_address' , $data1, "user_id=%d and primary_address='1'", $user_id);
			}
			
			
			
			if($user_id>0)
				$str.= "<xml><registration><success>1</success><userid>".$user_id."</userid></registration></xml>";
			else
				$str.= "<xml><registration><failure>0</failure><userid>".$user_id."</userid></registration></xml>";
		
			return $str;
	}
/* Registration Method Ends */

/* Get Profile Details Method */
	public function get_profile($user_id)
	{
			global $mw;
			
			$sql="select u.name,u.photo,u.created_date,u.rating,title from mw_user u, mw_title t where u.id=t.user_id and u.id='%d'";
			$results = $mw->queryFirstRow($sql,$user_id);
			$str= "<xml><profile>";
				if(count($results)>0)
			{
				$str.= "<name>".$results['name']."</name><photo_url>http://".SERVER_PATH."/mewants/images/users/".$results['photo']."</photo_url><created_date>".$results['created_date']."</created_date><rating>".$results['rating']."</rating><title>".$results['title']."</title>";
					
				$sql1="select feedback, rating  from mw_feedback  where user_id='".$user_id."'";
				$result = $mw->query($sql1);
				foreach ($result as $row)
				{
					$str.= "<review><description>".$row['feedback']."</description><review_rating>".$row['rating']."</review_rating></review>";
				}
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>Unable to load</error>";
				}
				
			$str.= "</profile></xml>";	
			return $str;
	
	}
/* Get Proflie Details Method Ends */

/* Get Personal Details Method */
	public function get_user_details($user_id)
	{
			global $mw;
		$str= "<xml><personal_details>";	
			$sql="select u.name,u.email,u.mobile,u.description,u.photo,u.created_date,u.rating,a.street,a.provience,a.town,a.zipcode,t.title from mw_user u left join  mw_address a  on u.id=a.user_id  left join mw_title t on  u.id=t.user_id where  u.id='%d' and a.primary_address='1'";
			
			$results = $mw->queryFirstRow($sql,$user_id);
			
			if(count($results)>0)
			{
				$str.= "<name>".$results['name']."</name><email>".$results['email']."</email><mobile>".$results['mobile']."</mobile><description>".$results['description']."</description><photo_url>http://".SERVER_PATH."/mewants/images/users/".$results['photo']."</photo_url><street>".$results['street']."</street><provience>".$results['provience']."</provience><town>".$results['town']."</town><zipcode>".$results['zipcode']."</zipcode><created_date>".$results['created_date']."</created_date><rating>".$results['rating']."</rating><title>".$results['name']."</title>";
					
				$sql1="select feedback, rating  from mw_feedback  where user_id='".$user_id."'";
				$result = $mw->query($sql1);
				foreach ($result as $row)
				{
					$str.= "<review><description>".$row['feedback']."</description><review_rating>".$row['rating']."</review_rating></review>";
				}
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>Unable to load</error>";
				}
				
			$str.= "</personal_details></xml>";	
			return $str;
	
	}
/* Get Personal Details Method Ends */
/* Get Task History Method */
	public function get_task_history($user_id,$flag)
	{
			global $mw;
			
			$str= "<xml><task_list>";
			if($flag==0||$flag==2)
			{
			$sql="select name,expiry,price,location_proximity,destination,payment_type,picture,description,allow_mobilenumber_view,assign_to from mw_task  where user_id='".$user_id."'";
				$result = $mw->query($sql);
			$str.= "<consumer>";	
				if(count($result)>0)
			{	
				foreach ($result as $row)
				{
					$str.= "<task><task_name>".$row['name']."</task_name><provider_id>".$row['asign_to']."</provider_id><expiry>".$row['expiry']."</expiry><destination>".$row['destination']."</destination><distance>".$row['location_proximity']."</distance><final_bid>".$row['price']."</final_bid><task_description>".$row['description']."</task_description><task_image_path>".$row['picture']."</task_description><task_payment_type>".$row['payment_type']."</task_payment_type><view_mobile_number>".$row['allow_mobilenumber_view']."</view_mobile_number></task>";
				}
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}
			$str.= "</consumer>";
			}
			if($flag==1||$flag==2)
			{
			$str.= "<provider>";
			$sql="select name,expiry,price,location_proximity,destination,payment_type,picture,description,allow_mobilenumber_view,assign_to from mw_task  where assign_to='".$user_id."'";
				$result = $mw->query($sql);
				
				if(count($result)>0)
			{	
				foreach ($result as $row)
				{
					$str.= "<task><task_name>".$row['name']."</task_name><expiry>".$row['expiry']."</expiry><destination>".$row['destination']."</destination><distance>".$row['location_proximity']."</distance><final_bid>".$row['price']."</final_bid><task_description>".$row['description']."</task_description><task_image_path>".$row['picture']."</task_description><task_payment_type>".$row['payment_type']."</task_payment_type><view_mobile_number>".$row['allow_mobilenumber_view']."</view_mobile_number></task>";
				}
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}	
			$str.= "</provider>";
			}
$str.= "<user_review>";
			$sql1="select feedback, rating  from mw_feedback  where user_id='".$user_id."'";
				$result = $mw->query($sql1);
					if(count($result)>0)
			{
			foreach ($result as $row)
				{
					$str.= "<review><description>".$row['feedback']."</description><review_rating>".$row['rating']."</review_rating></review>";
				}	
				
			}
				else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}	
			$str.="</user_review>";	
			$str.= "</task_list></xml>";	
			return $str;
	
	}
/* Get  Task History List  Methods end */

/* Delete Task Methods start */

/* Delete Task Methods ends */
public function delete_task($task_id)
	{
	$str= "<xml><task_delete>";
	
	$result = $mw->delete('mw_task', "id=%d", $task_id);
	if($result)
	{
	$str.= "<success>1</success>";
	}
	else
		{ 
		$str.= "<failure>0</failure><error>".$sql."</error>";
		}	
	
	$str.= "</task_delete></xml>";	
	return $str;
	}
/* Get Task Details Methods Start */
	public function get_task_details($task_id)
	{
			global $mw;
			
			$str= "<xml><task>";
			
			$sql="select name,expiry,price,location_proximity,destination,payment_type,picture,description,allow_mobilenumber_view,assign_to from mw_task  where id='".$task_id."'";
				$result = $mw->query($sql);
				
				if(count($result)>0)
			{	
					$str.= "<task_name>".$row['name']."</task_name><provider_id>".$row['asign_to']."</provider_id><expiry>".$row['expiry']."</expiry><destination>".$row['destination']."</destination><distance>".$row['location_proximity']."</distance><final_bid>".$row['price']."</final_bid><task_description>".$row['description']."</task_description><task_image_path>".$row['picture']."</task_description><task_payment_type>".$row['payment_type']."</task_payment_type><view_mobile_number>".$row['allow_mobilenumber_view']."</view_mobile_number>";
				
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}
				
			$str.= "<task_review>";
			$sql1="select feedback, rating  from mw_feedback  where task_id='".$task_id."'";
				$result = $mw->query($sql1);
					if(count($result)>0)
			{
			foreach ($result as $row)
				{
					$str.= "<review><description>".$row['feedback']."</description><review_rating>".$row['rating']."</review_rating></review>";
				}	
				
			}
				else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}	
			$str.="</task_review>";	
			$str.= "</task></xml>";	
			return $str;
	
	}
/* Get  Task List  Methods end */

		public function post_task($user_id,$task_name,$image,$task_amount,$expiry,$proxmity,$task_destination,$payment_type,$task_description,$share_number,$task_id)
				{
					global $mw;
					$photo="task_".$user_id."_".mktime().".png";
					$thefile = base64_decode($image);  
					
					
					if($image!='')  
					{
							file_put_contents('images/tasks/'.$photo,$thefile);
							$image = new SimpleImage();
							$image->load('images/tasks/'.$photo);
							$image->resize(100,100);
							$image->save('images/tasks/'.$photo);
					}
					
						$dat=explode('$$',$task_destination);
						
						
					 $data1= array('user_id' => $user_id,'street' => $dat[0] ,'provience' => $dat[1] , 'town' => $dat[2] ,'zipcode' => $dat[3] );	
					
					$mw->insert('mw_address' , $data1);
					$d_id=$mw->insertId();
							$data=array('user_id' 			=>	$user_id,
										'name' 				=>	$task_name,
										'picture' 			=>	$photo, 
										'price' 			=>	$task_amount,
										'expiry'			=>	$expiry,
										'location_proximity'=>	$proxmity,
										'destination'		=>	$d_id,
										'payment_type'		=>	$payment_type,
										'description'		=>	$task_description,
										'allow_mobilenumber_view'=>	$share_number);
					
						if($task_id==0)
					{	
						$mw->insert('mw_task' , $data);
					}
					else
					{	
						$mw->update('mw_task' , $data, "id=%d", $task_id);
					}
					if($mw->insertId()>0)
					$str= "<xml><post_task><success>1</success></post_task></xml>";
					else
					$str= "<xml><post_task><failure>0</failure><error>jhgjh</error></post_a_task></xml>";
					
					return $str;
				}
/* Post a Task  Methods end */

		
/* Post a Review Method Starts */
	public function post_review($user_id,$task_id,$bid_id,$description,$rating)
		{
			global $mw;
		
			$data=array('user_id'=>$user_id,
						'task_id'=>$task_id,
						'bid_id'=>$bid_id, 
						'feedback'=>$description,
						'rating'=>$rating				
						);
			
			$mw->insert('mw_feedback' , $data);
			
			if($mw->insertId()>0)
			$str.= "<xml><post_review><success>1</success></post_review></xml>";
			else
			$str.= "<xml><post_review><failure>0</failure><error>".$mw->insertId()."</error></post_review></xml>";
			
			return $str;
		}
/* Post a Review Ends */

/* Add to Favorites Method Starts */
	public function add_to_favorites($user_id,$bid_id,$task_id)
		{
			global $mw;
		
			$data=array('user_id'=>$user_id,
						'task_id'=>$task_id,
						'favorite_user_id'=>$bid_id	
						);
			
			$mw->insert('mw_favorite' , $data);
			
			if($mw->insertId()>0)
			$str.= "<xml><add_to_favorites><success>1</success></add_to_favorites></xml>";
			else
			$str.= "<xml><add_to_favorites><failure>0</failure><error>".$mw->insertId()."</error></add_to_favorites></xml>";
			
			return $str;
		}
/*  Add to Favorites  Ends */

/* Bid on Task Method Starts */
	public function bid_on_task($user_id,$bid_amount,$task_id,$allow_contact,$distance)
		{
			global $mw;
		
			$data=array('user_id'=>$user_id,
						'task_id'=>$task_id,
						'bid_amount'=>$bid_amount,
						'allow_contact'=>$allow_contact,
						'distance' => $distance,
						'bid_time'=>'NOW()',	
						);
			
			$mw->insert('mw_bid' , $data);
			
			if($mw->insertId()>0)
			$str.= "<xml><bid_on_task><success>1</success></bid_on_task></xml>";
			else
			$str.= "<xml><bid_on_task><failure>0</failure><error>".$mw->insertId()."</error></bid_on_task></xml>";
			
			return $str;
		}
/*   Bid on Task  Ends */

/* Get get bid details Method Starts */
	public function get_bid_details($bid_id)
		{
			global $mw;
		
		$str= "<xml><get_bid_details>";
			
			$sql="select id,user_id,task_id,distance,bid_amount,allow_contact,bid_time,created_date  from mw_bid  where id='".$bid_id."'";
				$row = $mw->query($sql);
				
				if(count($row)>0)
			{	
					$str.= "<user_id>".$row['user_id']."</user_id><task_id>".$row['task_id']."</task_id><distance>".$row['distance']."</distance><bid_amount>".$row['bid_amount']."</bid_amount><allow_contact>".$row['allow_contact']."</allow_contact><bid_time>".$row['bid_time']."</bid_time><created_date>".$row['created_date']."</created_date>";
				
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}
				$str.="</get_bid_details></xml>";
			return $str;
		}
/*   Get bid details Ends */

/* Get get bid details Method Starts */
	public function get_bid_list($task_id)
		{
			global $mw;
		
		$str= "<xml><get_bid_details>";
			
			$sql="select id,user_id,task_id,distance,bid_amount,allow_contact,bid_time,created_date  from mw_bid  where task_id='".$task_id."'";
				$result = $mw->query($sql);
				
				if(count($result)>0)
			{	
			foreach ($result as $row)
				{
					$str.= "<bid><user_id>".$row['user_id']."</user_id><task_id>".$row['task_id']."</task_id><distance>".$row['distance']."</distance><bid_amount>".$row['bid_amount']."</bid_amount><allow_contact>".$row['allow_contact']."</allow_contact><bid_time>".$row['bid_time']."</bid_time><created_date>".$row['created_date']."</created_date><bid>";
				}	
					
				
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}
				$str.="</get_bid_details></xml>";
			return $str;
		}
/*   Get bid details Ends */


/* Get Bid by task_id, consumer_id Method Starts */
	public function get_bid_by_task_n_consumer($task_id, $consumer_id)
		{
			global $mw;
		
		$str= "<xml><get_bid_by_task_n_consumer>";
			
			$sql="select id,user_id,task_id,distance,bid_amount,allow_contact,bid_time,created_date  from mw_bid  where task_id='".$task_id."' and user_id ='".$consumer_id."' ";
				$row = $mw->query($sql);
				
				if(count($row)>0)
			{	
					$str.= "<user_id>".$row['user_id']."</user_id><task_id>".$row['task_id']."</task_id><distance>".$row['distance']."</distance><bid_amount>".$row['bid_amount']."</bid_amount><allow_contact>".$row['allow_contact']."</allow_contact><bid_time>".$row['bid_time']."</bid_time><created_date>".$row['created_date']."</created_date>";
				
									
			}	
			else
				{ 
				$str.= "<failure>0</failure><error>".$sql."</error>";
				}
				$str.="</get_bid_by_task_n_consumer></xml>";
			return $str;
		}
/*   Get Bid by bid_id Ends */

}

?>
