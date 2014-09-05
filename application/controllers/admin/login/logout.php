<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends MY_Controller {
	
	public function index($renderdata="")
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}
	
}
