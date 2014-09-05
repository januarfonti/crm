<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends GU_Controller {
	function __construct()
	{
		parent::__construct();
			
		$this->id			= $this->uri->segment(3);
		$this->database		= $this->db->dbprefix('shop_cart');
		$this->site_title	= 'Add to Cart';
		$this->load->model('form/insert');		
		
	}
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('quantity', 'quantity', '');
		$this->form_validation->set_rules('price', 'price', '');
		$this->form_validation->set_rules('product', 'product', '');
				
		//form error delimiters		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('shop/cart');
		}
		
		else 
		{
			$p = set_value('price');
			$q = set_value('quantity');
			$prices =  $p * $q;
			
			$form_data = array(
					       	'userid' 	=> $this->userid,
							'product' 	=> set_value('product'),
							'quantity'	=> set_value('quantity'),
					       	'prices' 	=> $prices
						);	
			if ($this->insert->saveform($form_data) == TRUE) { redirect('shop/carts/#cart-added'); }
			else  { redirect('shop/carts/#error'); }
		}
	}

	
}
