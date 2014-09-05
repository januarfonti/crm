<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->site_title	= 'Select Components';	
		
		//get menu child id	
		$this->id			= $this->uri->segment(3);	
		
		//component query
		$this->data_comp	= $this->db->dbprefix('asset');
		$this->comp_query	= $this->db->query('SELECT * FROM '. $this->data_comp . ' ORDER BY id ASC');
		$this->comp_result	= $this->comp_query->result();	
	}
	
	public function index($renderdata="") { $this->_render('component/page'); }
}
