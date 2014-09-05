<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New Core Menu";
		
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('menu');
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');		
		$this->form_validation->set_rules('permission', 'permission', 'required');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/menu/add');
		}
		else 
		{
			$form_data = array(
					       	'title' => set_value('title'),
							'status' => set_value('status'),
					       	'permission' => set_value('permission')
						);	
			if ($this->insert->saveform($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('admin/menu#saved');   // or whatever logic needs to occur
			}
			else
			{
				redirect('admin/menu#error'); 
			}
		}
	}

}
?>