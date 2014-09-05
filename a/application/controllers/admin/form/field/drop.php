<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('form_field');
		$this->data_core	= $this->uri->segment(3);
		$this->id			= $this->uri->segment(6);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/form/'.$this->data_core.'/field/#deleted');
		else redirect('admin/form'.$this->data_core.'/field/#error');
		
	}
}
?>

