<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class MY_Controller extends CI_Controller{
        
	protected $data 		= Array();
	protected $template 	= "skeleton";
	protected $site_title	= FALSE;
	protected $description 	= FALSE;
	protected $keywords 	= FALSE;
	protected $author 		= FALSE;
        
	function __construct()
	{        
		parent::__construct();
		//site config
		$this->sc_query					= $this->db->query( ' SELECT * FROM ' . $this->db->dbprefix('config') . ' WHERE id = 1 ' );
		$this->sconfig					= $this->sc_query->row();
		
		$this->site_title				= $this->config->item('site_title');
		$this->description 				= $this->config->item('description');
		$this->keywords 				= $this->config->item('keywords');
		$this->author 					= $this->config->item('author');
		$this->base						= base_url();
		$this->bootstrap				= base_url() . 'dist/';
		$this->current_url				= current_url();
		$this->navbar					= $this->uri->segment(2);
		
		$this->load->model('user','',TRUE);
		$this->load->library('session');
		
		$this->ruri 		= uri_string();
		$this->fredirect 	= $this->base . $this->ruri;
	
		//load time library
		$this->load->helper('date');
		$this->time_format 		= '%Y-%m-%d';
		$this->current_times 	= time();
		$this->current_time		= mdate($this->time_format, $this->current_times ); 
		
		//form
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->gform					= array('class' => 'form-horizontal', 'id' => '');
		$this->gclose					= form_close();
		$this->gsave					= array('class' => 'btn btn-success smooth', 'name'  => 'submit', 'value' => 'Save' );
		$this->submit	 				= '<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save </button>';
		$this->shopcart	 				= '<button type="submit" class="btn btn-success"> <i class="fa fa-shopping-cart"></i> Add to Cart </button>';
		$this->shopcancel				= '<button type="submit" class="btn btn-warning"> <i class="fa fa-trash-o"></i> Delete Order </button>';
		$this->updates	 				= '<button type="submit" class="btn btn-success"> <i class="fa fa-repeat"></i> Update </button>';
		$this->drop	 					= '<button type="submit" class="btn btn-danger"> <i class="fa fa-trash-o"></i> Delete </button>';
		
	}
}