<?php
class logxmodules extends CI_Model
{
	function savemodule($module_name,$modules_description)
	{
		$query =  $this->db->query("call saveModules('".$module_name."','3','".$modules_description."')");
		//if($query->num_rows() == 1)
		if($query)
		{
		  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	}
	function getmadules(){
		$query =  $this->db->query("SELECT `modules_id`,`module_name` FROM `modules");
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
	function logx($name)
	{
		$query =  $this->db->query("call savelogx('".$name."')");
		if($query->num_rows() == 1)
		{
		  return array('st'=>1,'msg' =>'Submit Sucessfully');
		}
	}
}
	?>