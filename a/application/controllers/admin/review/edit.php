<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('review');
		$this->id			= $this->uri->segment(4);
		$this->load->model('form/update');
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('title', 'title', '');						
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/review'); }
		else 
		{				
			$form_data = array('title' => set_value('title'));
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/review/#updated');  }
			else 
				{ redirect('admin/review/#error');  }
		}
	}
}
?>

