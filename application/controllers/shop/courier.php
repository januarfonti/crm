<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class courier extends GU_Controller {
               
	function __construct()
	{
    parent::__construct();
		$this->site_title 	= "Select Courier";
		
		//Product Query
		$this->database		= $this->db->dbprefix('shop_carts');		
		$this->query		= $this->db->query('SELECT * FROM '. $this->db->dbprefix('shop_product') .' ORDER BY title ASC');
		$this->items		= $this->query->result();
		$this->load->model('form/update');
		
		if ($this->session_data)
		{
		$this->u_query		= $this->db->query('SELECT * FROM '. $this->database .' WHERE status = 0 AND uid = ' .$this->userid);
		$this->u_item		= $this->u_query->row();
		$this->id			= $this->u_item->id;
		
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
		$this->form_validation->set_rules('courier', 'courier', '');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		if ($this->form_validation->run() == FALSE) { $this->_render('shop/courier'); }
		
		else 
		{
			$form_data = array(
							'status' => 1,
							'courier' => set_value('courier')
						);	
			if ($this->update->saveform($form_data) == TRUE) { redirect('shop/checkout/#saved'); }
			else { redirect('shop/courier/#error'); }
		}
	}

}
?>