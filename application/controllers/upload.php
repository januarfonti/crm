<?php

class upload extends AD_Controller {
	
	function __construct()
	{
 		parent::__construct();
		$this->site_title 	= "Try Upload";
		$this->database		= $this->db->dbprefix('sample');
		$this->load->model('form/insert');
	}	
	
	//function index() { $this->load->view('upload', array('error' => ' ' )); }
	public function index($renderdata="") { $this->_render('upload'); }
	
	function do_upload($renderdata="")
	{
		//upload config
		$config['upload_path'] 		= './media/blog';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '900';
		
		//upload config
		$this->load->library('upload', $config);
		
		//database rules
		$this->form_validation->set_rules('image', 'image', '');
		$this->form_validation->set_rules('name', 'name', '');	
		
		//error delimiters
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		if ( ! $this->upload->do_upload('image')) {}
		$data_uploads = $this->upload->data();
			
		if ($this->form_validation->run() == FALSE) { $this->_render('upload'); }
		else 
		{
			$form_data = array(	     
				'name' 	=> set_value('name'),
				'image' => $data_uploads['file_name']
				);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('upload#saved'); }
			else { redirect('upload#error'); }
		}
		
	}
}
?>