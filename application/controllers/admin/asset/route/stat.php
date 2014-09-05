<?php
class stat extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->database		= $this->db->dbprefix('component');
		$this->id			= $this->uri->segment(3);
		$this->parents		= $this->uri->segment(5);
		$this->load->model('form/update');
			
	}	
	
	function on($renderdata="")
	{			
		$this->db->where('id', $this->id);
		$this->db->update($this->database, array('status' => 1)); 
		if ($this->db->affected_rows() == '1') redirect('admin/route/'.$this->parents.'/#updated');
		else redirect('aadmin/route/'.$this->id.'/#error');
	}
	
	function off($renderdata="")
	{			
		$this->db->where('id', $this->id);
		$this->db->update($this->database, array('status' => 0)); 
		if ($this->db->affected_rows() == '1') redirect('admin/route/'.$this->parents.'/#updated');
		else redirect('aadmin/route/'.$this->id.'/#error');
	}
}
?>