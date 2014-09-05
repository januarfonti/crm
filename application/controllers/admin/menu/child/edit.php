<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		
		$this->database		= $this->db->dbprefix('menu_child');
		$this->core			= $this->uri->segment(3);
		$this->id			= $this->uri->segment(6);
		
		$this->parents_query1	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu_child') .' WHERE id = ' . $this->id);
		$this->parents_result1	= $this->parents_query1->row();
		
		$this->site_title 	= "Edit Data Child Menu - " . $this->parents_result1->title;
		
		$this->parents_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu_child') .' WHERE parent = 0 AND menu = ' . $this->core);
		$this->parents_result	= $this->parents_query->result();
		
		$this->load->model('form/update');
		
		//Get menu data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
		$this->menu		= $this->query->row();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('parent', 'parent', '');
		$this->form_validation->set_rules('orders', 'orders', 'required');		
		$this->form_validation->set_rules('title', 'title', 'required');	
		$this->form_validation->set_rules('link', 'link', 'required');	
		$this->form_validation->set_rules('icon', 'icon', '');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/menu/child/edit'); }
		else 
		{			
			$form_data = array(
					       	'parent' => set_value('parent'),
							'orders' => set_value('orders'),
					       	'title' => set_value('title'),
							'link' => set_value('link'),
							'icon' => set_value('icon')
						);	
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/menu/'.$this->core.'/child#success');  }
			else 
				{ redirect('admin/menu/'.$this->core.'/child#error');  }
		}
	}
}
?>