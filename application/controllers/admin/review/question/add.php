<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->load->model('form/insert');
		$this->id		= $this->uri->segment(4);
		$this->database	= $this->db->dbprefix('review_question');
	}	
	
	function index($renderdata="")
	{				
		$this->form_validation->set_rules('question', 'question', 'required');
		$this->form_validation->set_rules('score', 'score', 'score');		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{
			$this->_render('admin/review/question/');
		}
		else 
		{
			$form_data = array(
				'rid' => $this->id ,
				'question' => set_value('question') ,
				'score' => set_value('score')
				);
		
			if ($this->insert->saveform($form_data) == TRUE) { redirect('admin/review/question/'.$this->id.'/#saved'); }
			else { redirect('admin/review/question/'.$this->id.'/#error'); }
		}
	}
}
?>