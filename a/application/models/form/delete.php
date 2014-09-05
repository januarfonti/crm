<?php
class delete extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function SaveForm($form_data)
	{
		//$this->db->where('id', $this->id);		
		//$this->db->delete($this->database, $form_data);
		$this->db->delete($this->database, array('id' => $this->id));
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
}
?>