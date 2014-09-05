<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class confirm extends GU_Controller {
               
	function __construct()
	{	
		parent::__construct();
		//$this->site_title 	= "Add New Product";
		$this->load->model('form/insert');
		$this->database		= $this->db->dbprefix('shop_carts');
	}	
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('carts', 'carts', '');
		$this->form_validation->set_rules('total', 'total', '');
		$this->form_validation->set_rules('created', 'created', '');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		if ($this->form_validation->run() == FALSE) { $this->_render('shop/carts'); }
		
		else 
		{
			$form_data = array(
					       	'uid' => $this->userid,
					       	'carts' => set_value('carts'),
							'total' => set_value('total'),
							'created' => $this->current_time
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('shop/courier/#saved'); }
			else { redirect('shop/courier/#error'); }
		}
	}

}
?>