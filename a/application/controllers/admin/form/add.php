<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New Form";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('form');
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('map', 'map', 'required');		
		
		$this->form_validation->set_rules('success', 'success', '');
		
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
			{ $this->_render('admin/form/add'); }
		else 
		{
			$form_data = array(
					       	'name' => set_value('name'),
							'map' => set_value('map'),
							
							'success' => set_value('success'),
							
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/form#saved'); }
			else { redirect('admin/form#error'); }
		}
	}
}
?>