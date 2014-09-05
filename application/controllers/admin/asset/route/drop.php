<?php
class drop extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('component');
		$this->par			= $this->uri->segment(3);
		$this->id			= $this->uri->segment(5);
	}	
	
	function index($renderdata="")
	{			
		$this->db->delete($this->database, array('id' => $this->id)); 
		if ($this->db->affected_rows() == '1') redirect('admin/route/'.$this->par.'/#deleted');
		else redirect('admin/route/'.$this->par.'/error');
		
	}
}
?>

