<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class drop extends GU_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('shop_cart');
		$this->id			= $this->uri->segment(3);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('shop/carts/#deleted');
		else redirect('shop/carts/#error');
		
	}
}
?>

