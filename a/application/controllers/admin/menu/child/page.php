<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->data_menu	= $this->db->dbprefix('menu_child');
		$this->data_core	= $this->uri->segment(3);
		
		$this->core_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu') .' WHERE id = ' . $this->data_core);
		$this->core_result	= $this->core_query->row();
		
		$this->site_title	= $this->core_result->title . ' Menu';		
		
		$this->menu_query	= $this->db->query('SELECT * FROM '. $this->data_menu .' WHERE parent = 0 AND menu = ' . $this->data_core . ' ORDER BY orders ASC');
		$this->menu_result	= $this->menu_query->result();
	}
	
	public function index($renderdata="")
	{	
		$this->_render('admin/menu/child/page');
	}
}
