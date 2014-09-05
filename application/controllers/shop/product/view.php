<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view extends GU_Controller {
	function __construct()
	{
		parent::__construct();
			
		$this->id			= $this->uri->segment(3);
		$this->database		= $this->db->dbprefix('shop_product');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database . ' WHERE id = ' . $this->id);
		$this->item			= $this->query->row();

		$this->site_title	= $this->item->title;	
	}
	
	public function index($renderdata="") { $this->_render('shop/product/view'); }
	
}
