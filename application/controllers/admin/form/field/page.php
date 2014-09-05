<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
		parent::__construct();
		$this->data_form	= $this->db->dbprefix('form_field');
		$this->data_core	= $this->uri->segment(3);
		
		$this->core_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('form') .' WHERE id = ' . $this->data_core);
		$this->core_result	= $this->core_query->row();
		
		$this->site_title	= $this->core_result->name;		
		
		$this->form_query	= $this->db->query('
			SELECT *, a.type AS atype, b.type AS btype, a.id AS fid 
			FROM 
				'.$this->db->dbprefix('form_field') .' AS a JOIN 
				'.$this->db->dbprefix('form_type').' AS b	
			ON
				a.type = b.id
			WHERE 
				a.form = ' . $this->data_core . ' 
			ORDER BY a.orders ASC');
		$this->form_result	= $this->form_query->result();
	}
	
	public function index($renderdata="")
	{	
		$this->_render('admin/form/field/page');
	}
}
