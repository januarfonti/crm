<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('asset');
		$this->id			= $this->uri->segment(4);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/component/#deleted');
		else redirect('admin/component/#error');
		
	}
}
?>

