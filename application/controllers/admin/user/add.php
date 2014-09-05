<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New User";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('users');
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('name', 'name', 'required');			
		$this->form_validation->set_rules('username', 'username', 'required');			
		$this->form_validation->set_rules('password', 'password', 'required');			
		$this->form_validation->set_rules('level', 'level', 'required');			
		$this->form_validation->set_rules('status', 'status', 'required');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{ $this->_render('admin/user/add'); }
		else 
		{
			$form_data = array(
					       	'name' => set_value('name'),
					       	'username' => set_value('username'),
					       	'password' => md5(set_value('password')),
					       	'level' => set_value('level'),
					       	'status' => set_value('status')
						);
			if ($this->insert->saveform($form_data) == TRUE) 
				{ redirect('admin/user#saved');  }
			else 
				{ redirect('admin/user/#error');  }
		}
	}
}
?>