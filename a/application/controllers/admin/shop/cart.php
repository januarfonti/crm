<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Shop Carts';	
		$this->id			= $this->uri->segment(4);
		$this->database		= $this->db->dbprefix('shop_carts');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database . ' WHERE id = ' . $this->id );
		$this->item			= $this->query->row();	
	}
	
	public function index($renderdata="") { $this->_render('admin/shop/cart'); }	
}
