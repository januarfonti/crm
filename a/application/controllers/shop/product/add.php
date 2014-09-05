<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New Product";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('shop_product');
	}	
	
	function index($renderdata="")
	{	
		//upload config
		$config['upload_path'] 		= './media/shop';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '900';
		
		//upload config
		$this->load->library('upload', $config);
		
		$this->form_validation->set_rules('catid', 'catid', '');
		$this->form_validation->set_rules('title', 'title', '');
		$this->form_validation->set_rules('alias', 'alias', '');
		$this->form_validation->set_rules('price', 'price', '');
		$this->form_validation->set_rules('discount', 'discount', '');		
		$this->form_validation->set_rules('image', 'image', '');
		$this->form_validation->set_rules('description', 'description', '');	
		
		//form error delimiters		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		//upload function
		if ( ! $this->upload->do_upload('image')) {}
		$data_uploads = $this->upload->data();
			
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/shop/product/add');
		}
		
		else 
		{
			$input_title = set_value('title');
			$form_data = array(
					       	'catid' => set_value('catid'),
							'title' => $input_title ,
							'alias' => strtolower(preg_replace('/\s+/', '-', $input_title)),
					       	'price' => set_value('price'),
							'discount' => set_value('discount'),
							'image' => $data_uploads['file_name'],
							'description' => set_value('description')
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/shop/product/#saved'); }
			else { redirect('admin/shop/product/add/#error'); }
		}
	}

}
?>