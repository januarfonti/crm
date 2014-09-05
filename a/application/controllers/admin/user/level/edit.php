<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Level Data User";
		$this->database		= $this->db->dbprefix('users_level');
		$this->id			= $this->uri->segment(5);
		$this->load->model('form/update');
		
		//Get user data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
		$this->user		= $this->query->row();
	}	
	
	function index($renderdata="")
	{				
		$this->form_validation->set_rules('levels', 'levels', '');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/user/level'); }
		else 
		{			
			$form_data = array('levels' => set_value('levels'));
			
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/user/level#success');  }
			else 
				{ redirect('admin/user/level#error');  }
		}
	}
}
?>