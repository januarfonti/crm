<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class thanks extends GU_Controller {
               
	function __construct()
	{
		parent::__construct();
		$this->site_title 	= "Thank You for your order";
	}
	
	function index($renderdata="")
	{	
		$this->_render('shop/thanks');
	}

}
?>