<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('users_level');
		$this->id			= $this->uri->segment(5);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/user/level#deleted');
		else redirect('admin/user/level#error');
		
	}
}
?>

