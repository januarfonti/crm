<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add Route";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('component');
		$this->parents		= $this->uri->segment(3);
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('status', 'status', '');
		$this->form_validation->set_rules('orders', 'orders', '');
		$this->form_validation->set_rules('name', 'name', '');		
		$this->form_validation->set_rules('routes', 'routes', '');
		
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
			{ $this->_render('admin/asset/route/add'); }
		else 
		{
			$form_data = array(
					       	'parents' => $this->parents,
							'status' => set_value('status'),
							'orders' => set_value('orders'),
							'name' => set_value('name'),
							'routes' => set_value('routes')
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/route/'.$this->parents.'/#saved'); }
			else { redirect('admin/route/'.$this->parents.'/add/#error'); }
		}
	}
}
?>