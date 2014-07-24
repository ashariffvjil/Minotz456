<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends CI_Controller {

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
		$countries_data=$this->user->getCountries();
		$data['countries']=$countries_data;
		$this->load->view('patients',$data);
	}
	
	public function newpatient()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_firstname', 'First Name', 'required');
		$this->form_validation->set_rules('txt_lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('txt_dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('id_gender', 'Gender', 'required');
		$this->form_validation->set_rules('txt_hos_mrn', 'Hospital MRN', 'required');
		$this->form_validation->set_rules('txt_nhs', 'NHS Number', 'required');
		$this->form_validation->set_rules('txt_address', 'Address', 'required');
		$this->form_validation->set_rules('txt_city', 'City', 'required');
		$this->form_validation->set_rules('txt_state', 'State', 'required');
		$this->form_validation->set_rules('txt_zipcode', 'Postal Code', 'required');
		$this->form_validation->set_rules('txt_phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			$first_name = $this->input->post('txt_firstname');
			$last_name = $this->input->post('txt_lastname');
			$dob=$this->input->post('txt_dob');
			$gender=$this->input->post('id_gender');
			$hospital_mrn=$this->input->post('txt_hos_mrn');
			$nhs_number=$this->input->post('txt_nhs');
			$address=$this->input->post('txt_address');
			$address1=$this->input->post('txt_address1');
			$city=$this->input->post('txt_city');
			$state=$this->input->post('txt_state');
			$shortinfo=$this->input->post('txt_info');
			$phone=$this->input->post('txt_phone');
			$zipcode = $this->input->post('zipcode');
			$country=$this->input->post('country_id');
			$photo_path=$this->input->post('txt_photo');
			//$user=$this->session->userdata('user');
			//$userid=$user['userid'];
			$userid='3';
			$result=$this->patients->savepatient($userid,$first_name,$last_name,$dob,$gender,$hospital_mrn,$nhs_number,$shortinfo,$address,$address1,$city,$state,$zipcode,$country,$phone,$photo_path);
			if($result) 
			{
				echo json_encode($result);
			}

		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */