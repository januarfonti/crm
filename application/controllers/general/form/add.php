<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add extends AD_Controller {
	function __construct()
	{
		parent::__construct();
		//get form data	
		$this->id			= $this->uri->segment(2);	
		$this->data_form	= $this->db->dbprefix('form');
		$this->form_query	= $this->db->query('SELECT * FROM '. $this->data_form .' WHERE id = ' . $this->id );
		$this->form_result	= $this->form_query->row();	
		
		//database mapping
		$this->database		= $this->form_result->map;
		$this->site_title	= ucfirst($this->form_result->name);	
		
		//get form field
		$this->data_field	= $this->db->dbprefix('form_field');
		$this->data_type	= $this->db->dbprefix('form_type');
		$this->field_query	= $this->db->query('
			SELECT 
				*, 
				a.type as ntype, 
				b.type as ftype 
				
			FROM 
				'. $this->data_field .' AS a 
			JOIN 
				'.$this->data_type.' AS b
			ON 
				a.type = b.id
			WHERE 
				a.form = ' . $this->id );
		$this->field_result	= $this->field_query->result();	
	}
	
	public function index($renderdata="") 
	{ 
		//upload config
		$config['upload_path'] 		= './media/blog';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '500';
		
		//upload config
		$this->load->library('upload', $config);
		
		//form field validation
		foreach ($this->field_result as $this->f)
		{ 
			$this->form_validation->set_rules($this->f->field, $this->f->field, ''); 
		}
		
		$this->form_validation->set_error_delimiters('');
		
		//image uploads
		foreach ($this->field_result as $this->f)
		{
			if ($this->f->ftype == 6)
			{
				if ( ! $this->upload($this->f->field)) {}
				$data_uploads = $this->upload->data();
			}
		}
		
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('general/form/view'); }
		else 
		{			
			
			$form_data = array();	
			foreach ($this->field_result as $this->f)
			{ 
				if ($this->f->ftype == 6) $form_data[$this->f->field] = $data_uploads['file_name'];
				else $form_data[$this->f->field] = set_value($this->f->field);
			} 			
						
						
			$this->load->model('form/insert');			
			if ($this->insert->saveform($form_data) == TRUE) { redirect($this->base . $this->form_result->success.'/#saved');  }
			else  { redirect($this->base .'form/'.$this->id.'/#error');  }
		}	
	}
}
