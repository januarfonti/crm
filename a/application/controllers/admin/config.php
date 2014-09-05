<?php
class config extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Global Configuration";
		$this->database		= $this->db->dbprefix('config');
		$this->load->model('form/update');
		
		//Get menu data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = 1 ' );
		$this->con		= $this->query->row();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('name', 'name', '');
		$this->form_validation->set_rules('author', 'author', '');		
		$this->form_validation->set_rules('copyright', 'copyright', '');			
		$this->form_validation->set_rules('metadata', 'metadata', '');	
		$this->form_validation->set_rules('metakey', 'metakey', '');		
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/config'); }
		else 
		{			
			$form_data = array(
					       	'name' => set_value('name'),
							'author' => set_value('author'),
					       	'metadata' => set_value('metadata'),
							'metakey' => set_value('metakey'),
							'copyright' => set_value('copyright')
						);
			
			$this->db->where('id', 1);		
			$this->db->update($this->database, $form_data);
			
			if ($this->db->affected_rows() == '1') redirect('admin/config#updated');
			else redirect('admin/config#error');
			
		}
	}
	
	
}
?>