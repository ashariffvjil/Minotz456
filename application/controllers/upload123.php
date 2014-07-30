<?php
class Upload123 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       // $this->load->model('files_model');
        $this->load->database();
        $this->load->helper('url');
    }
 
    public function index()
    {
        $this->load->view('upload123');
    }



	function do_upload()
{
    $config['upload_path'] = './application/views/minotz/uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '1000';
    $config['max_width']  = '';
    $config['max_height']  = '';
    $config['overwrite'] = TRUE;
    $config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
	//print_r($this->upload->do_upload());
    if ( ! $this->upload->do_upload())
    {
        $error = array('error' => $this->upload->display_errors());
       echo '-------upload failed due to this error----->'.$this->upload->display_errors();
    }
    else
    {
        $data = array('upload_data' => $this->upload->data());
		echo '---*****Successfully uploaded----';
    }
}
}
?>