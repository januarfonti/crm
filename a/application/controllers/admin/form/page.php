<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title	= "Form Manager";		
		$this->data_form	= $this->db->dbprefix('form');
		
		$this->form_query	= $this->db->query('SELECT * FROM '. $this->data_form .' ORDER BY id ASC');
		$this->form_result	= $this->form_query->result();
		
		$this->usl_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") .' ORDER BY id ASC');
		$this->usl_result	= $this->usl_query->result();
	}
	
	public function index($renderdata="")
	{	
		$this->_render('admin/form/page');
	}
}
