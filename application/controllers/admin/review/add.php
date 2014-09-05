<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('review');
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('title', 'title', 'required');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{ $this->_render('admin/review'); }
		else 
		{
			$form_data = array('title' => set_value('title'));
			if ($this->insert->saveform($form_data) == TRUE) 
				{ redirect('admin/review/#saved');  }
			else 
				{ redirect('admin/review/#error');  }
		}
	}
}
?>