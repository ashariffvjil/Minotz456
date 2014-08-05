<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configurator extends CI_Controller {

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
		$data['logx']=$this->patients_models->getlogxs();
		$data['modules']=$this->logxmodules->getmadules();
		$this->load->view('config_index',$data);
	}
	public function newmodule()
	{
		$this->load->view('module');
	} 
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */