<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AD_Controller extends MY_Controller 
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
	}
	
	protected function _render($view,$renderdata="FULLPAGE") 
	{
		$toTpl["site_title"] 		= $this->site_title;
		$toTpl["description"] 		= $this->description;
		$toTpl["keywords"] 			= $this->keywords;
		$toTpl["author"] 			= $this->author;
        
		$toBody["content_body"] 	= $this->load->view($view,array_merge($this->data,$toTpl),true);
		$toBody["header"] 			= $this->load->view("admin/template/header",'',true);
		$toBody["pagetitle"]		= $this->load->view("admin/template/pagetitle",'',true);
		$toBody["navbar"] 			= $this->load->view("admin/template/navbar",'',true);
		$toBody["bread"]	 		= $this->load->view("admin/template/bread",'',true);
        $toTpl["body"] 				= $this->load->view("admin/template/".$this->template,$toBody,true);
        
		if ($this->userid == 0)  $this->load->view("admin/expired");
		else if (($this->userid >= 1) && ($this->userid <= 5) )  $this->load->view("admin/template/skeleton",$toTpl);
		else $this->load->view("admin/expired");
	}
}
