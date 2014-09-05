<?php
class update extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	function SaveForm($form_data)
	{
		$this->db->where('id', $this->id);		
		$this->db->update($this->database, $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
}
?>