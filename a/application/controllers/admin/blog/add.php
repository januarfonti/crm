<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Add New Blog";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('blog');
	}	
	
	function index($renderdata="")
	{	
		//upload config
		$config['upload_path'] 		= './media/blog';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '900';
		
		//upload config
		$this->load->library('upload', $config);
		
		$this->form_validation->set_rules('title', 'title', '');
		$this->form_validation->set_rules('created', 'created', '');
		$this->form_validation->set_rules('alias', 'alias', '');
		$this->form_validation->set_rules('status', 'status', '');		
		$this->form_validation->set_rules('image', 'image', '');
		$this->form_validation->set_rules('catid', 'catid', '');
		$this->form_validation->set_rules('author', 'author', '');
		$this->form_validation->set_rules('content', 'content', '');	
		
		//form error delimiters		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		//upload function
		if ( ! $this->upload->do_upload('image')) {}
		$data_uploads = $this->upload->data();
			
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/blog/add');
		}
		
		else 
		{
			$input_title = set_value('title');
			$form_data = array(
					       	'created' => set_value('created'),
							'title' => $input_title ,
							'alias' => strtolower(preg_replace('/\s+/', '-', $input_title)),
					       	'status' => set_value('status'),
							'catid' => set_value('catid'),
							'author' => set_value('author'),
							'image' => $data_uploads['file_name'],
							'content' => set_value('content')
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/blog#saved'); }
			else { redirect('admin/blog/add/#error'); }
		}
	}

}
?>