<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Data Form";
		$this->database		= $this->db->dbprefix('form');
		$this->id			= $this->uri->segment(3);
		$this->load->model('form/update');
		
		//Get menu data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
		$this->form		= $this->query->row();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('map', 'map', 'required');		
		
		$this->form_validation->set_rules('success', 'success', '');
		
			
		$this->form_validation->set_error_delimiters('');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/form'); }
		else 
		{			
			$form_data = array(
					       	'name' => set_value('name'),
							'map' => set_value('map'),	
							'success' => set_value('success'),
							
						);	
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/form#updated');  }
			else 
				{ redirect('admin/form#error');  }
		}
	}
}
?>