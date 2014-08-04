<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Controller {

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
		//$user=$this->session->userdata('user');
		//if(!empty($user)) redirect('home');
		$patients_data=$this->patients_models->getPatients();
		$data['patients']=$patients_data;
		$doctors_data=$this->patients_models->getDoctors();
		$data['doctors']=$doctors_data;
		$logx_data=$this->patients_models->getlogxs();
		$data['logx']=$logx_data;
		
		$this->load->view('appointment',$data);
	}
	
	public function newappointment()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
		$this->form_validation->set_rules('doctor_name', 'Doctor Name', 'required');
		$this->form_validation->set_rules('logx_name', 'Logx Name', 'required');
		$this->form_validation->set_rules('txt_doa', 'Date of Appointment', 'required');
		//$this->form_validation->set_rules('txt_toahh', 'Appointment Time', 'required');
		$this->form_validation->set_rules('txt_referred', 'Referred By', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			$patient_name = $this->input->post('patient_name');
			$doctor_name = $this->input->post('doctor_name');
			$logx_name=$this->input->post('logx_name');
			$doa=$this->input->post('txt_doa');
			$doa_db=$this->input->post('txt_doa_db');
			$user=$this->session->userdata('user');
			$userid=$user['userid'];
			$referred_by=$this->input->post('txt_referred');
			$note=$this->input->post('txt_note');
			//$userid=$user['userid'];
			//$userid='3';
			$result=$this->patients_models->saveappointment($userid,$patient_name,$doctor_name,$logx_name,$doa_db,$referred_by,$note);
			if($result) 
			{
				echo json_encode($result);
			}

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */