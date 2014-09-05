<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends AD_Controller {
	
	public function index($renderdata="")
	{
		if ($this->session_data)
		{
			$this->site_title = "Admin Dashboard";
			$this->_render('admin/dashboard/home');
		}
		
		else
		{
			$this->site_title = 'Super Administrator Login';
			$this->author = 'Dimas Seputro';
			$this->description = 'Simple Content Management System based on Code Igniter ';
			
			$this->_render('admin/login',$renderdata);
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin/login', 'refresh');
	}
}
