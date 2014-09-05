<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verify extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('superuser','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed User redirected to login page
     redirect('admin/#login-error', 'refresh');
   }
   else
   {
     //Go to private area
     redirect('admin', 'refresh');
   }

 }

function check_database($password)
{
   $username = $this->input->post('username');
   $result = $this->superuser->login($username, $password);

	if($result)
	{
		$sess_array = array();
		foreach($result as $row)
		{
		$sess_array = array(
			'id' => $row->id,
			'level' => $row->level,
			'username' => $row->username,
			'name' => $row->name
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
}
?>
