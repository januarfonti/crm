<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends GU_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Blogs';	
		$this->database		= $this->db->dbprefix('blog');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database . ' ORDER BY title ASC');
		$this->result		= $this->query->result();	
	}
	
	public function index($renderdata="") { $this->_render('blog/page'); }
	
}
