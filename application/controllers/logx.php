<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logx extends CI_Controller {

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
		$this->load->view('logx');
    }
	public function save_logx()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('logx_name', 'Logx Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st'=>0,'msg' => validation_errors()));
		}
		else 
		{
			$logx_name = $this->input->post('logx_name');
			$result=$this->logxmodules->logx($logx_name);
			if($result) 
			{
			echo json_encode($result);
			}
		
		}
	
	
	}
  
 	

 	
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */