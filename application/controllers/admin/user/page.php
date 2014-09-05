<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends AD_Controller {

	function __construct()
	{
    parent::__construct();
		$this->site_title = "User Manager";
		
		$this->data_user	= $this->db->dbprefix('users');
		$this->data_level	= $this->db->dbprefix('users_level');
		
		$this->user_query	= 
			$this->db->query('
				SELECT 
					*,
					a.id as uid,
					b.id as lid	
				FROM 
					'. $this->data_user .' as a JOIN
					'. $this->data_level .' as b	
				ON
					a.level = b.id					
				ORDER BY 
					a.id ASC');
		$this->user_result	= $this->user_query->result();
	}
	
	public function index($renderdata="")
	{
		
		$this->_render('admin/user/page');
	}
}
