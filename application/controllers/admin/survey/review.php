<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Reviews Detail';	
		$this->id		= $this->uri->segment(3);
		$this->table	= $this->db->dbprefix('review_answer');
		$this->query	= $this->db->query('
			SELECT 
				*
			FROM 
				'. $this->table . ' 
			WHERE id = '. $this->id );
		$this->item	= $this->query->row();	
	}
	
	public function index($renderdata="") { $this->_render('admin/survey/review'); }	
}
