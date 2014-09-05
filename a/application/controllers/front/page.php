<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends GU_Controller {

	function __construct()
	{
		parent::__construct();
		$this->site_title	= "Front";		

	}
	
	public function index($renderdata="")
	{	
		$this->_render('front/page');
	}
}
