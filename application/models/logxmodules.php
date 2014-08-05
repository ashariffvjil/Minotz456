<?php
class logxmodules extends CI_Model
{
	function savemodule($module_name,$modules_description)
	{
		$query =  $this->db->query("call saveModules('".$module_name."','3','".$modules_description."')");
		if($query)
		{
		  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	}
	function getmadules(){
		$this->db->reconnect();
		$query =  $this->db->query("SELECT `modules_id`,`module_name` FROM modules");
		if($query->num_rows() >0)
		{ 
			foreach($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return 0;
	}
	function getlogxs(){
		$query =  $this->db->query("SELECT `logx_id`,`name` FROM `logx");
		if($query->num_rows() >0)
		{ 
			foreach($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return 0;
	}
	function logx($name,$userid)
	{
		$query =  $this->db->query("call savelogx('".$name."','".$userid."')");
		if($query)
		{
		  return array('st'=>1,'msg' =>'Submit Sucessfully');
		}
	}
	function getmapped_madules($logxid)
	{
		$query_getmodules =  $this->db->query("SELECT `modules_ids` FROM logx where logx_id='".$logxid."'")->row()->modules_ids;
		return $query_getmodules;
		/*if($query_getmodules->num_rows() >0)
		{
			$query =  $this->db->query("SELECT `modules_id`,`module_name` FROM modules");
			if($query->num_rows() >0)
			{ 
				foreach($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			return 0;
		}
		*/
	}
}
	?>