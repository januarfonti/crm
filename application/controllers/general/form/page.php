<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		//get form data	
		$this->id			= $this->uri->segment(2);	
		$this->data_form	= $this->db->dbprefix('form');
		$this->form_query	= $this->db->query('SELECT * FROM '. $this->data_form .' WHERE id = ' . $this->id );
		$this->form_result	= $this->form_query->row();	
		
		//database mapping
		$this->database		= $this->form_result->map;
		$this->site_title	= ucfirst($this->form_result->name);	
		
		//get form field
		$this->data_field	= $this->db->dbprefix('form_field');
		$this->data_type	= $this->db->dbprefix('form_type');
		$this->field_query	= $this->db->query('
			SELECT *, a.type as ntype, b.type as ftype 
			FROM '. $this->data_field .' AS a JOIN '.$this->data_type.' AS b
			ON a.type = b.id
			WHERE a.form = ' . $this->id . '
			ORDER BY orders ASC');
		$this->field_result	= $this->field_query->result();	
	}
	
	public function index($renderdata="") { $this->_render('general/form/page'); }
}
