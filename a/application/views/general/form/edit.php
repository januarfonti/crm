<?php 

$format = '%Y-%m-%d';
$time = time();

echo '
'.form_open_multipart('form/'.$this->fid.'/'.$this->id.'/edit', $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			<div class="actions-button">
				'.$this->submit.'
				<a class="btn btn-warning" href="'.$this->base . $this->form_result->success.'/"> <i class="fa fa-mail-reply"></i> Cancel </a>
			</div>
			<a class="btn btn-success" href="'.$this->base.'admin/form/'.$this->fid.'/field/"> <i class="fa fa-magic"></i> Edit Fields </a>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">';

		foreach ($this->field_result as $field)
		{ 
		
		//Saved value Query
		$this->saved_query	= $this->db->query('SELECT * FROM '. $this->database .' WHERE id = ' . $this->id );
		$this->saved_value	= $this->saved_query->row();		
		
		//Get table row title
		$field_title		= $field->field;
		
		//Saved Value
		$saved_value		= $this->saved_value->$field_title;
		
		if ($field->ntype < 7) 
			{
			echo '
				<div class="control-group">
					<label class="control-label">'.$field->title.'</label>
						<div class="controls">';		
						switch ($field->ntype)
						{
							case 1 : 
							echo '
								<input class="input-xxlarge" id="'.$field->field.'" type="text" name="'.$field->field.'" value="'.$saved_value.'">
								<span class="help-inline">'.form_error($field->field).'</span>'; break;
								
							case 2 : 
						echo '
							<textarea id="'.$field->field.'" name="'.$field->field.'" class="span11" rows="15">'.$saved_value.'</textarea>'; break;
								
							case 3 : 
							echo '
								<input class="input-xxlarge" id="'.$field->field.'" type="text" name="'.$field->field.'" value="'.$saved_value.'">
								<span class="help-inline">'.form_error($field->field).'</span>'; break;	
							
							case 6 : 
							echo '
								<div data-provides="fileupload" class="fileupload fileupload-new">
									<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
										<img alt="" src="'.$this->base.'media/default.gif">
									</div>
									<div style="max-width: 450px; max-height: 300px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
									<div>
										<span class="btn btn-file"> 
											<span class="fileupload-new"> <i class="fa fa-search-plus"></i> Browse </span>
											<span class="fileupload-exists"> <i class="fa fa-reply-all"></i> Change </span>
											<input type="file" id="'.$field->field.'" name="'.$field->field.'" class="default">
										</span>
										<a data-dismiss="fileupload" class="btn fileupload-exists" href="#"> <i class="fa fa-times"></i> Remove</a>
									</div>
								</div>'; break;		
						}		
echo '					</div>
				</div>';
			}

		switch ($field->ntype)
			{
				case 8 : echo '<input id="'.$field->field.'" type="hidden" name="'.$field->field.'" value="'.mdate($format, $time).'">'; break;
				case 9 : echo '<input id="'.$field->field.'" type="hidden" name="'.$field->field.'" value="'.$this->userid.'">'; break;		
			}
		
		}		
echo '	</div>
	</div>		
'.$this->gclose.'	
';





?>