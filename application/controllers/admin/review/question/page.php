<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title 	= "Question Manager";
		$this->rid		= $this->uri->segment(4);
		$this->database	= $this->db->dbprefix('review_question');
		$this->query	= $this->db->query('SELECT * FROM '. $this->database .' WHERE rid = ' . $this->rid . ' ORDER BY id ASC');
		$this->items	= $this->query->result();
	}
	
	public function index($renderdata="")
	{
		$this->_render('admin/review/question/page');
	}
}
