<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Data menu";
		$this->database		= $this->db->dbprefix('menu');
		$this->id			= $this->uri->segment(4);
		$this->load->model('form/update');
		
		//Get menu data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
		$this->menu		= $this->query->row();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('title', 'title', '');			
		$this->form_validation->set_rules('status', 'status', '');			
		$this->form_validation->set_rules('permission', 'permission', '');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/menu/edit'); }
		else 
		{			
			$form_data = array(
					       	'title' => set_value('title'),
							'status' => set_value('status'),
					       	'permission' => set_value('permission')
						);
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/menu#updated');  }
			else 
				{ redirect('admin/menu#error');  }
		}
	}
}
?>