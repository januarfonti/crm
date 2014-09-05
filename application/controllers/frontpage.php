<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class frontpage extends GU_Controller {
	
	function __construct()
	{
 		parent::__construct();
		$this->site_title 	= "Selamat Datang";
	}	
	public function index($renderdata="") { $this->_render('frontpage/page'); }
}
?>