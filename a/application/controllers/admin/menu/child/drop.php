<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('menu_child');
		$this->id			= $this->uri->segment(6);
		$this->ref			= $this->uri->segment(3);
	}	
	
	function index($renderdata="")
	{					
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/menu/'.$this->ref.'/child#deleted');
		else redirect('admin/menu/'.$this->ref.'/child#error');
		
	}
}
?>

