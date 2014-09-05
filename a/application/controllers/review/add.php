<?php
class add extends AD_Controller {
               
	function __construct()
	{	
		parent::__construct();
		$this->load->model('form/insert');
		$this->rid			= $this->uri->segment(2);
		$this->question		= $this->db->dbprefix('review_question');
		$this->database		= $this->db->dbprefix('review_answer');
		
		$this->query	= $this->db->query( ' SELECT * FROM ' . $this->question . ' WHERE rid = ' . $this->rid );
		$this->items	= $this->query->result();
	}	
	
	function index($renderdata="")
	{			
		$this->form_validation->set_rules('content', 'content', '');	
		foreach($this->items as $this->item)
			{
				$this->form_validation->set_rules($this->item->id, $this->item->id, '');	
			} 		
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) 
		{ $this->_render('admin/review'); }
		else 
		{
			//$input_title = set_value('title');
			$this->questions 	= $this->db->count_all($this->question);
			$this->qarray		= '';
				foreach($this->items as $this->item)
				{
					$this->qarray.= $this->item->id . '#' . set_value($this->item->id) . ',' ;
				} 			
			
			$form_data = array(
				'uid' => $this->userid ,
				'content' => $this->qarray
			);
			
			
			
			if ($this->insert->saveform($form_data) == TRUE) 
				{ redirect('review/'.$this->rid.'/#saved');  }
			else 
				{ redirect('review/'.$this->rid.'/#error');  }
		}
	}
}
?>