<?php
class insert extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	function saveform($form_data)
	{
		$this->db->insert($this->database, $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
}
?>