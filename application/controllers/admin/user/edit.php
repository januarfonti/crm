<?php
class edit extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Data User";
		$this->database		= $this->db->dbprefix('users');
		$this->id			= $this->uri->segment(4);
		$this->load->model('form/update');
		
		$this->u_query	= $this->db->query('SELECT * FROM '. $this->database . ' WHERE id = ' . $this->id);
		$this->u_result	= $this->u_query->row();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('name', 'name', '');			
		$this->form_validation->set_rules('username', 'username', '');			
		$this->form_validation->set_rules('password', 'password', '');			
		$this->form_validation->set_rules('level', 'level', '');			
		$this->form_validation->set_rules('status', 'status', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  
			{ $this->_render('admin/user/edit'); }
		else 
		{			
			if (set_value('password')) $pass = md5(set_value('password')); else $pass = $this->u_result->password;
		
			$form_data = array(
					       	'name' => set_value('name'),
					       	'username' => set_value('username'),
					       	'password' => $pass,
					       	'level' => set_value('level'),
					       	'status' => set_value('status')
						);
			if ($this->update->saveform($form_data) == TRUE) 
				{ redirect('admin/user#updated');  }
			else 
				{ redirect('admin/user/#error');  }
		}
	}
}
?>

