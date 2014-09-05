<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends MY_Controller {

	public function index($renderdata="")
	{
		$this->site_title = "Admin Dashboard";
		$this->_render('admin/dashboard/home');
	}
}
