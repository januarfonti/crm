<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Shop Products';	
		$this->table	= $this->db->dbprefix('shop_product');
		$this->query	= $this->db->query('SELECT * FROM '. $this->table . ' ORDER BY id ASC');
		$this->result	= $this->query->result();	
	}
	
	public function index($renderdata="") { $this->_render('admin/shop/product/page'); }	
}
