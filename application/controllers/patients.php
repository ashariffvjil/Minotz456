<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       // $this->load->model('patients_models');
        $this->load->database();
        $this->load->helper('url');
    }
	/**
	 * Index Page for this controller.
	 *
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
		$this->load->helper('birthdate');
		$data['birth_date_year'] = buildYearDropdown('birth_date_year', $this->input->post('birth_date_year'));
		$data['birth_date_month'] = buildMonthDropdown('birth_date_month', $this->input->post('birth_date_month'));
		$data['birth_date_day'] = buildDayDropdown('birth_date_day', $this->input->post('birth_date_day'));	
		
		$this->load->view('patients',$data);
	}
	 function newpatient()
	{
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('txt_firstname', 'First Name', 'required');
		$this->form_validation->set_rules('txt_lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('birth_date_year', 'Date of Birth Year', 'required');
		$this->form_validation->set_rules('birth_date_month', 'Date of Birth Month', 'required');
		$this->form_validation->set_rules('birth_date_day', 'Date of Birth Day', 'required');
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
			$config['upload_path'] = './application/views/minotz/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';
			$config['max_width']  = '';
			$config['max_height']  = '';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
			    //echo '-------upload failed due to this error----->'.$this->upload->display_errors();
			}
			else
			{
				 $data = array('upload_data' => $this->upload->data());
				//echo $data['upload_data']['full_path'];
			}
			if($data){
				$first_name = $this->input->post('txt_firstname');
				$last_name = $this->input->post('txt_lastname');
				$dob=$this->input->post('birth_date_year').'-'.$this->input->post('birth_date_month').'-'.$this->input->post('birth_date_day');
				$gender=$this->input->post('id_gender');
				$hospital_mrn=$this->input->post('txt_hos_mrn');
				$nhs_number=$this->input->post('txt_nhs');
				$address=$this->input->post('txt_address');
				$address1=$this->input->post('txt_address1');
				$city=$this->input->post('txt_city');
				$state=$this->input->post('txt_state');
				$shortinfo=$this->input->post('txt_info');
				$phone=$this->input->post('txt_phone');
				$zipcode = $this->input->post('txt_zipcode'); 
				$country=$this->input->post('country_id');
				$photo_path=$data['upload_data']['full_path'];
				$user=$this->session->userdata('user');
				//$userid=$user['userid'];
					$userid='3';
				$result=$this->patients_models->savepatient($userid,$first_name,$last_name,$dob,$gender,$hospital_mrn,$nhs_number,$shortinfo,$address,$address1,$city,$state,$zipcode,$country,$phone,$photo_path);
				if($result) 
				{
					echo json_encode($result);
				}
			}

		}
	} 
}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */