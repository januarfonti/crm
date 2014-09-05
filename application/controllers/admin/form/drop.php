<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('form');
		$this->id			= $this->uri->segment(3);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/form#deleted');
		else redirect('admin/form#error');
		
	}
}
?>

