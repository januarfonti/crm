<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title 	= "User Level Manager";
		$this->data_level	= $this->db->dbprefix('users_level');
		
		$this->user_query	= $this->db->query('SELECT * FROM '. $this->data_level .' ORDER BY id ASC');
		$this->user_result	= $this->user_query->result();
	}
	
	public function index($renderdata="")
	{
		$this->_render('admin/user/level/page');
	}
}
