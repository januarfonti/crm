<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view extends GU_Controller {
	function __construct()
	{
		parent::__construct();
			
		$this->id			= $this->uri->segment(3);
		$this->database		= $this->db->dbprefix('blog');
		$this->query		= $this->db->query('SELECT * FROM '. $this->database . ' WHERE id = ' . $this->id);
		$this->content		= $this->query->row();

		$this->site_title	= $this->content->title;	
	}
	
	public function index($renderdata="") { $this->_render('blog/view'); }
	
}
