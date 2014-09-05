<?php 

	$form_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('form') );
	$form		= $form_query->result();
		

echo '
	
		<a class="icon-btn span2" href="'.$this->current_url.'/form/1">
			<i class="icon-group"></i>
				<div>Add New Form</div>
		</a>
	</div>
';?>