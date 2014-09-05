<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class checkout extends GU_Controller {
               
	function __construct()
	{
    parent::__construct();
		$this->site_title 	= "Confirm Orders";
		
		$this->database		= $this->db->dbprefix('shop_carts');	
		$this->query		= $this->db->query('SELECT * FROM '. $this->database .' WHERE status = 1 AND uid = ' .$this->userid);
		$this->item			= $this->query->row();
		$this->id			= $this->item->id;
		
		$this->usr_database		= $this->db->dbprefix('users');	
		$this->usr_query		= $this->db->query('SELECT * FROM '. $this->usr_database .' WHERE id = ' .$this->userid);
		$this->usr				= $this->usr_query->row();
		
		$this->load->model('form/update');
		
		if ($this->session_data)
		{	
		//Cart Query
		$this->c_database	= $this->db->dbprefix('shop_cart');		
		$this->c_query		= 
		$this->db->query('
			SELECT *, a.id AS cid, b.id AS pid 
			FROM '. $this->c_database .' AS a JOIN '.$this->db->dbprefix('shop_product').' AS b
			ON a.product = b.id
			WHERE a.userid = '.$this->userid);
		$this->carts		= $this->c_query->result();
		
		//Total Query
		$this->t_database	= $this->db->dbprefix('shop_cart');
		$this->t_query		= $this->db->query('SELECT SUM(prices) AS totals FROM '. $this->t_database .' WHERE userid = '.$this->userid);
		$this->tq			= $this->t_query->row();
		$this->totals		= $this->tq->totals;
		}
		
	}
	
	function index($renderdata="")
	{	
		$this->form_validation->set_rules('email', 'email', '');
		$this->form_validation->set_rules('address', 'address', '');
		$this->form_validation->set_rules('phone', 'phone', '');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		if ($this->form_validation->run() == FALSE) { $this->_render('shop/checkout'); }
		
		else 
		{
			$form_data = array(
							'status' => 1
						);	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/final/#saved'); }
			else { redirect('shop/final/#error'); }
		}
	}

}
?>