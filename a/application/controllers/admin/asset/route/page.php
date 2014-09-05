<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->par			= $this->uri->segment(3);
		$this->data_comp	= $this->db->dbprefix('component');
		$this->comp_query	= $this->db->query('SELECT * FROM '. $this->data_comp . ' WHERE parents = ' . $this->par . ' ORDER BY orders ASC');
		$this->comp_result	= $this->comp_query->result();	
		
		$this->pt_query		= $this->db->query('SELECT * FROM '. $this->db->dbprefix('asset') . ' WHERE id = ' . $this->par );
		$this->pt			= $this->pt_query->row();	
		
		$this->site_title	= ucfirst($this->pt->name) . ' Routes Controller';	
	}
	
	public function index($renderdata="") { $this->_render('admin/asset/route/page'); }
}
