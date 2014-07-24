<?php
class module extends CI_Model
{
	function savemodule($module_name,$modules_description)
	{
	echo '-->'.$module_name.'------------'.$modules_description;
	return $module_name.'------------'.$modules_description;
	//exit();
		//$query =  $this->db->query("call saveModules('".$module_name."','".$modules_description."')");
		//if($query->num_rows() == 1)
		//{
		//  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		//}
	}
}
	?>