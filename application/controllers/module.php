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
		$this->load->view('module');
		
	}
	public function configurator()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('module_name', 'Module name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
						 
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
		$module_name = $this->input->post('module_name');
		
		
		/* $result=$this->module->createmodule($module_name);
		if($result) 
		{
			echo json_encode($result);
		} */
		}
		//echo '------------------------------'.$module_name;
		$this->load->view('configurator');
	}
	

 	

 	
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */