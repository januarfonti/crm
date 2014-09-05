<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class task extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->load->model('form/update');
		$this->id		= $this->uri->segment(4);
		$this->database	= $this->db->dbprefix('shop_carts');
	}	
	
	public function index($renderdata="") { $this->_render('admin/shop/cart'); }	
	function approve($renderdata="")
	{			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		$form_data = array('status' => 2 );	
		if ($this->update->saveform($form_data) == TRUE) { redirect('admin/shop/cart/'.$this->id.'/#updated'); }
		else { redirect('admin/shop/cart/'.$this->id.'/#error'); }
		
	}
	
	function pending($renderdata="")
	{			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		$form_data = array('status' => 1 );	
		if ($this->update->saveform($form_data) == TRUE) { redirect('admin/shop/cart/'.$this->id.'/#updated'); }
		else { redirect('admin/shop/cart/'.$this->id.'/#error'); }
		
	}

}
?>