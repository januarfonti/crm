<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GU_Controller extends MY_Controller 
{	
	function __construct()
	{
		parent::__construct();
		//user session
		$this->session_data = $this->session->userdata('logged_in');
		$this->userid	 	= $this->session_data['id'];
		$this->username 	= $this->session_data['username'];
		$this->name 		= $this->session_data['name'];
		$this->user_level 	= $this->session_data['level'];
		$this->user_name 	= $this->session_data['name'];
		$this->user_address	= $this->session_data['address'];
		$this->user_email 	= $this->session_data['email'];
		$this->user_phone 	= $this->session_data['phone'];
	}

	protected function _render($view,$renderdata="FULLPAGE") 
	{
		$toTpl["site_title"] 		= $this->site_title;
		$toTpl["description"] 		= $this->description;
		$toTpl["keywords"] 			= $this->keywords;
		$toTpl["author"] 			= $this->author;
        
		$toBody["content_body"] 	= $this->load->view($view,array_merge($this->data,$toTpl),true);
		$toBody["header"] 			= $this->load->view("template/header",'',true);
		$toBody["pagetitle"]		= $this->load->view("template/pagetitle",'',true);
		$toBody["navbar"] 			= $this->load->view("template/navbar",'',true);
		$toBody["bread"]	 		= $this->load->view("template/bread",'',true);
        $toTpl["body"] 				= $this->load->view("template/".$this->template,$toBody,true);
        
		$this->load->view("template/skeleton",$toTpl);
	}
}
?>