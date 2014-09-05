<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		$this->site_title	= 'Reviews Survey';	
		$this->rid		= $this->uri->segment(3);
		$this->table	= $this->db->dbprefix('review_answer');
		$this->query	= $this->db->query('
			SELECT 
				*, a.id as aid, b.id as uid 
			FROM 
				'. $this->table . ' as a
			JOIN 
				'.$this->db->dbprefix('users').' as b
			ON 
				a.uid = b.id
			ORDER BY 
				a.id ASC ' );
		$this->items	= $this->query->result();	
	}
	
	public function index($renderdata="") { $this->_render('admin/survey/page'); }	
}
