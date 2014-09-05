<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->site_title	= 'Select Components';	
		
		//get menu child id	
		$this->id			= $this->uri->segment(3);	
		
		//component query
		$this->data_asset	= $this->db->dbprefix('asset');
		$this->asset_query	= $this->db->query('SELECT * FROM '. $this->data_asset . ' ORDER BY id ASC');
		$this->assets		= $this->asset_query->result();	
	}
	
	public function index($renderdata="") { $this->_render('component/page'); }
}
