<?php
class modulecreation extends CI_Model
{
	function savemodule($module_name,$modules_description)
	{
	//echo '-->'.$module_name.'------------'.$modules_description;
	
		//$query =  $this->db->query("call saveModules('".$module_name."','3','".$modules_description."')");
		//if($query->num_rows() == 1)
		//{
		//  return array('st'=>1, 'msg' =>'Submit Sucessfully');
		//}
		return 'hello';//$module_name.'@@@'.$modules_description;
		//array('st'=>$module_name, 'msg' =>$modules_description);
	}
}
	?>