<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
    parent::__construct();
		$this->site_title = "Review Manager";
		
		$this->database		= $this->db->dbprefix('review');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database .' ORDER BY title ASC');
		$this->items		= $this->query->result();
	}
	
	public function index($renderdata="")
	{
		
		$this->_render('admin/review/page');
	}
}
