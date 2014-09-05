<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends GU_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Reviews';	
		$this->rid		= $this->uri->segment(2);
		$this->table	= $this->db->dbprefix('review_question');
		$this->query	= $this->db->query('SELECT * FROM '. $this->table . ' WHERE rid = '.$this->rid.' ORDER BY id ASC ' );
		$this->items	= $this->query->result();	
	}
	
	public function index($renderdata="") { $this->_render('review/page'); }	
}
