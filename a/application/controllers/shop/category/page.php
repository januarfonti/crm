<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title	= "Menu Manager";		
		$this->database		= $this->db->dbprefix('product_category');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database .' ORDER BY id ASC');
		$this->result		= $this->query->result();
	}
	
	public function index($renderdata="")
	{	
		$this->_render('product/category/page');
	}
}
