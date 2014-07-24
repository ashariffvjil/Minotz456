<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

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
	$user=$this->session->userdata('user');
	if(!empty($user)) redirect('home');
	 $this->load->view('login',array('header'=>false));
   }
   public function signup()
	{
	$countries_data=$this->user->getCountries();
	$data['countries']=$countries_data;
	$occupation_data=$this->user->getOccupations();
	$data['occupations']=$occupation_data;
		$this->load->view('signup',array('header'=>false,'data'=>$data));
   }
    public function logout()
	{
	$this->session->unset_userdata('user');
	redirect('login');
   }
   public  function check()
 {
 	
 	$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]');		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
						 
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember');
			
						
			$result=$this->user->checkLogin($username,$password);
			if($result) 
			{
			if($result['st']==1) {
			if($remember) {
            $month = time() + (60 * 60 * 24 * 30);
            $this->input->set_cookie('remember', $username, $month);
            $this->input->set_cookie('username', $username, $month);
            $this->input->set_cookie('password', $result['password'], $month);
        } elseif (!$remember) {
            $past = time() - 100;
            $past = time() - 100;
            if (isset($_COOKIE['remember'])) {
                 $this->input->set_cookie('remember', '', $past);
            } elseif (isset($_COOKIE['username'])) {
                 $this->input->set_cookie('username', '', $past);
            } elseif (isset($_COOKIE['password'])) {
                 $this->input->set_cookie('password', '', $past);
            }
        		}
			 $this->session->set_userdata('user',$result); 
			} 
			
			echo json_encode($result);
			}
		}
  
 }
 	public function save_signup()
	{
 		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('country_id', 'Country', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]');		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[re-password]');
		$this->form_validation->set_rules('re-password', 'Confirm Password', 'required');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'required');
		$this->form_validation->set_rules('occupation_id', 'Occupation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
						 
			echo json_encode(array('st'=>0, 'msg' => validation_errors()));
		}
		else 
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$country_id = $this->input->post('country_id');
			$zipcode = $this->input->post('zipcode');
			$occupation_id = $this->input->post('occupation_id');
			
			$result=$this->user->signup($first_name,$last_name,$country_id,$zipcode,$occupation_id,$username,$email,$password);
			if($result) 
			{
			echo json_encode($result);
					}

		}
	}

 	public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 function configurator()
 {
 
	$this->load->view('configurator');
 
 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */