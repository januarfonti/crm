<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Route";
		$this->load->model('form/update');
		$this->database		= $this->db->dbprefix('component');
		$this->parents		= $this->uri->segment(3);
		$this->id			= $this->uri->segment(5);
		
		$this->comp_query	= $this->db->query('SELECT * FROM '. $this->database . ' WHERE id = ' . $this->id);
		$this->comp			= $this->comp_query->row();
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('status', 'status', '');
		$this->form_validation->set_rules('orders', 'orders', '');
		$this->form_validation->set_rules('name', 'name', '');		
		$this->form_validation->set_rules('routes', 'routes', '');
				
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
			{ $this->_render('admin/asset/route/edit'); }
		else 
		{
			$form_data = array(
							'status' => set_value('status'),
							'orders' => set_value('orders'),
							'name' => set_value('name'),
							'routes' => set_value('routes')
						);	
			if ($this->update->saveform($form_data) == TRUE) { redirect('admin/route/'.$this->parents.'/#updated'); }
			else { redirect('admin/route/'.$this->parents.'/edit/#error'); }
		}
	}
}
?>