<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->table	= $this->db->dbprefix('shop_category');
		$this->query	= $this->db->query('SELECT * FROM ' . $this->table );
		$this->result	= $this->query->result();	
				
		$this->site_title	= 'Shop Category Manager';	
	}
	
	public function index($renderdata="") { $this->_render('admin/shop/category/page'); }
}
