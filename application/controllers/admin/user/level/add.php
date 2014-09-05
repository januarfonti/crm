<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New User";
		
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('users_level');
	}	
	
	function index($renderdata="")
	{				
		$this->form_validation->set_rules('levels', 'levels', 'required');				
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/user/level');
		}
		else 
		{
			$form_data = array('levels' => set_value('levels'));
		
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/user/level/#saved'); }
			else { redirect('admin/user/level#error'); }
		}
	}
}
?>