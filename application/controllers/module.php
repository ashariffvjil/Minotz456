<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['results']=$this->logxmodules->getmadules();
		$this->load->view('modules_list',$data);
	}
	public function newmodule()
	{
		$this->load->view('module');
	} 
	public function configurator()
	{
		$this->load->view('configurator');
	}
	public function check_configurator()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('modules_name', 'Module Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			$module_name = $this->input->post('modules_name');
			echo json_encode(array('st'=>1,'modules_name'=>$module_name));
		}
	}
	public function save_module()
	{
		$this->form_validation->set_rules('txt_description', 'Module', 'required');		
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			/*$module_name = $this->input->post('hid_modulename');
			$modules_description = $this->input->post('txt_description');
			$result=$this->logxmodules->savemodule($module_name,$modules_description);
			if($result) 
			{
				echo json_encode($result);
			}
			*/
		}
	
	
	
	
	
	
	
	}

 	

 	
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */