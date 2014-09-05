<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends GU_Controller {
	function __construct()
	{
    parent::__construct();
		$this->site_title 	= "Product Manager";
		
		//Product Query
		$this->database		= $this->db->dbprefix('shop_product');		
		$this->query		= $this->db->query('SELECT * FROM '. $this->database .' ORDER BY title ASC');
		$this->items		= $this->query->result();
		
		if ($this->session_data)
		{	
		//Cart Query
		$this->c_database	= $this->db->dbprefix('shop_cart');		
		$this->c_query		= 
		$this->db->query('
			SELECT *, a.id AS cid, b.id AS pid 
			FROM '. $this->c_database .' AS a JOIN '.$this->database.' AS b
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
	
	public function index($renderdata="")
	{
		
		$this->_render('shop/product/page');
	}
}
