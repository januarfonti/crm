<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('asset');
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
			{ $this->_render('admin/form/add'); }
		else 
		{
			$form_data = array(
					       	'name' => set_value('name')
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/component#saved'); }
			else { redirect('admin/component#error'); }
		}
	}
}
?>