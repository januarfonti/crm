<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New Fields";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('form_field');
		$this->data_core	= $this->uri->segment(3);
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('form', 'form', '');
		$this->form_validation->set_rules('orders', 'orders', '');	
		$this->form_validation->set_rules('title', 'title', '');	
		$this->form_validation->set_rules('field', 'field', '');			
		$this->form_validation->set_rules('type', 'type', '');
		$this->form_validation->set_rules('defaults', 'defaults', '');		
		$this->form_validation->set_rules('options', 'options', '');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
			{ $this->_render('admin/form/field/page'); }
		else 
		{
			$form_data = array(
					       	'form' => $this->data_core,
							'orders' => set_value('orders'),
							'title' => set_value('title'),
					       	'field' => set_value('field'),
							'type' => set_value('type'),
							'defaults' => set_value('defaults'),
					       	'options' => set_value('options')
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/form/'.$this->data_core.'/field#success'); }
			else { redirect('admin/form#error'); }
		}
	}
}
?>












