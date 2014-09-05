<?php
class edit extends GU_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->site_title 	= "Edit Level Data User";
		$this->database		= $this->db->dbprefix('users');
		$this->id			= $this->userid;
		$this->load->model('form/update');
		
		//Get user data from database
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
		$this->item		= $this->query->row();
	}	
	
	function name($renderdata="")
	{				
		$this->form_validation->set_rules('name', 'name', '');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  { $this->_render('shop/checkout'); }
		else 
		{			
			$form_data = array('name' => set_value('name'));	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/checkout#saved');  }
			else { redirect('shop/checkout#error');  }
		}
	}
	
	function address($renderdata="")
	{				
		$this->form_validation->set_rules('address', 'address', '');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  { $this->_render('shop/checkout'); }
		else 
		{			
			$form_data = array('address' => set_value('address'));	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/checkout#saved');  }
			else { redirect('shop/checkout#error');  }
		}
	}
	
	function phone($renderdata="")
	{				
		$this->form_validation->set_rules('phone', 'phone', '');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  { $this->_render('shop/checkout'); }
		else 
		{			
			$form_data = array('phone' => set_value('phone'));	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/checkout#saved');  }
			else { redirect('shop/checkout#error');  }
		}
	}
	
	function email($renderdata="")
	{				
		$this->form_validation->set_rules('email', 'email', '');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE)  { $this->_render('shop/checkout'); }
		else 
		{			
			$form_data = array('email' => set_value('email'));	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/checkout#saved');  }
			else { redirect('shop/checkout#error');  }
		}
	}
}
?>