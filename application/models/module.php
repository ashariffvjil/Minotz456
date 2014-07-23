<?php
class module extends CI_Model
{
	function createmodule($module_name)
	{
		$query =  $this->db->query("call savemodule('".$module_name."')");
		if($query->num_rows() == 1)
		{
		  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		}
	}
}
	?>