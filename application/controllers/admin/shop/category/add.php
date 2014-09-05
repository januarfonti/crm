<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('shop_category');
	}	
	
	function index($renderdata="")
	{				
		$this->form_validation->set_rules('title', 'title', '');
		$this->form_validation->set_rules('alias', 'alias', '');		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/blog/category');
		}
		else 
		{
			$input_title = set_value('title');
			$form_data = array(
				'title' => $input_title ,
				'alias' => strtolower(preg_replace('/\s+/', '-', $input_title))
				);
		
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/shop/category/#saved'); }
			else { redirect('admin/shop/category/#error'); }
		}
	}
}
?>