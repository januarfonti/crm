<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->data_core			= $this->uri->segment(3);
		
		$this->core_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu') .' WHERE id = ' . $this->data_core);
		$this->core_result	= $this->core_query->row();
		
		$this->site_title	= 'Add New Menu to ' .$this->core_result->title;		
		
		$this->parents_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu_child') .' WHERE parent = 0 AND menu = ' . $this->data_core . ' ORDER BY orders ASC');
		$this->parents_result	= $this->parents_query->result();
		
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('menu_child');
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('menu', 'menu', '');
		$this->form_validation->set_rules('parent', 'parent', '');
		$this->form_validation->set_rules('orders', 'orders', 'required');		
		$this->form_validation->set_rules('title', 'title', 'required');	
		$this->form_validation->set_rules('link', 'link', 'required');	
		$this->form_validation->set_rules('icon', 'icon', '');				
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/menu/child/add');
		}
		else 
		{
			$form_data = array(
					       	'menu' => $this->data_core,
					       	'parent' => set_value('parent'),
							'orders' => set_value('orders'),
					       	'title' => set_value('title'),
							'link' => set_value('link'),
							'icon' => set_value('icon')
						);	
			if ($this->insert->saveform($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('admin/menu/'.$this->data_core.'/child#success');   // or whatever logic needs to occur
			}
			else
			{
				redirect('admin/menu/'.$this->data_core.'/child#error'); 
			}
		}
	}
}
?>