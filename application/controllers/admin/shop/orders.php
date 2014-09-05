<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Shop Orders';	
		$this->database		= $this->db->dbprefix('shop_carts');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database . ' ORDER BY id DESC');
		$this->result		= $this->query->result();	
	}
	
	public function index($renderdata="") { $this->_render('admin/shop/orders'); }	
}
