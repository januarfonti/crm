<?php
class drops extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('shop_cart');
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('userid' => $this->userid)); 
		if ($this->db->affected_rows() >= '1') redirect('shop/thanks');
		else redirect('shop/checkout/#error');
		
	}
}
?>

