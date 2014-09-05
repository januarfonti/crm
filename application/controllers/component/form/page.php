<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->id			= $this->uri->segment(3);	
		$this->data_comp	= $this->db->dbprefix('component');
		$this->comp_query	= $this->db->query('SELECT * FROM '. $this->data_comp . ' ORDER BY name ASC');
		$this->component	= $this->comp_query->row();	
		
		
		$this->site_title	= 'Select Components';	
		
		//get menu child id	
		$this->id			= $this->uri->segment(3);	
		
	}
	
	public function index($renderdata="") { $this->_render('component/page'); }
}
