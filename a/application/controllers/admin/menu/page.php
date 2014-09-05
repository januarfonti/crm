<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title	= "Menu Manager";		
		$this->data_menu	= $this->db->dbprefix('menu');
		$this->menu_query	= $this->db->query('SELECT * FROM '. $this->data_menu .' ORDER BY id ASC');
		$this->menu_result	= $this->menu_query->result();
	}
	
	public function index($renderdata="")
	{	
		$this->_render('admin/menu/page');
	}
}
