<?php echo '
<div class="row-fluid">
	<div class="span3">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a 	data-toggle="modal" role="button" href="'.$this->base.'admin/form/'.$this->data_core.'/field/#add">
				<i class="fa fa-th-list"></i>
				<div class="info">Add Field+</div>
				</a>
			</div>
		</div>	
	</div>
</div>
	<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
		<div class="modal-header">
			<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h3> Add New Form </h3>
		</div>
						
		'.form_open('admin/form/'.$this->data_core.'/field/add/', $this->gform).'
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label">Name</label>
					<div class="controls">
						<input class="input-xlarge" id="title" type="text" name="title">
							<span class="help-inline">'.form_error('title').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Order</label>
					<div class="controls">
						<input class="input-xlarge" id="orders" type="text" name="orders">
							<span class="help-inline">'.form_error('orders').'</span>
					</div>				
			</div>	
			<div class="control-group">
				<label class="control-label">Save to</label>
					<div class="controls">';
						//$fields_query 	= $this->db->query('SELECT * FROM '. $this->core_result->map .' ORDER BY id ASC ');
						$fields 		= $this->db->list_fields($this->core_result->map);
						$fields_options = array();
						foreach ($fields as $field)
						{
						   $fields_options[$field] = $field; 
						} 
						echo form_dropdown('field', $fields_options, set_value('field'), 'id="dropdown" class="selectpicker"');	
echo'				</div>
			</div>	
			<div class="control-group">
				<label class="control-label">Field Type</label>
					<div class="controls">';
						$types_query 	= $this->db->query('SELECT * FROM '. $this->db->dbprefix("form_type") .' ORDER BY id ASC ');
						$types			= $types_query->result();
						$types_options 	= array();
						foreach ($types as $type)
						{
						   $types_options[$type->id] = $type->type;
						} 
						echo form_dropdown('type', $types_options, 1, 'id="dropdown" class="selectpicker"');
echo'				</div>					
			</div>
			<div class="control-group">
				<label class="control-label">Default Value</label>
					<div class="controls">
						<input class="input-xlarge" id="defaults" type="text" name="defaults">
							<span class="help-inline">'.form_error('defaults').'</span>
					</div>				
			</div>			
			<div class="control-group">
				<label class="control-label">Options</label>
					<div class="controls">
						<input class="input-xlarge" id="options" type="text" name="options">
							<span class="help-inline">'.form_error('options').'</span>
					</div>				
			</div>	
		</div>
		<div class="modal-footer"> '.$this->submit.' </div>
		'.$this->gclose.'
	</div>

<div class="row-fluid">
	<div class="span12">
		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">Order</span></th>
							<th class="span5">Field</th>
							<th class="span2">Input Type</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->form_result as $form)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$form->orders.'</td>
							<td>'.$form->title.'</td>
							<td>'.ucfirst($form->btype).'</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" role="button" href="'.$this->base.'admin/form/#edit-'.$form->fid.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$form->fid.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '		
					</tbody>
				</table>';
				
				$i=0; foreach ($this->form_result as $form)
				{
					$i++;
					echo '
					<div id="delete-'.$form->fid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/form/'.$this->data_core.'/field/drop/'.$form->fid.'', $this->gform).'
						<input id="id" type="hidden" name="id" value="'.$form->id.'">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3>Delete '.$form->title.' ?</h3>
						</div>
						<div class="modal-body">
							<p><span class="label label-important">Warning!</span> This action cant be undone!</p>
						</div>
						<div class="modal-footer"> '.$this->drop.' </div>
						'.$this->gclose.'
					</div>
					
					<div id="edit-'.$form->fid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit Form </h3>
						</div>
										
						'.form_open('admin/form/'.$this->data_core.'/field/edit/'.$form->fid.'', $this->gform).'
						<div class="modal-body">
							<div class="control-group">
								<label class="control-label">Name</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title" value="'.$form->title.'">
											<span class="help-inline">'.form_error('title').'</span>
									</div>
							</div>
							<div class="control-group">
								<label class="control-label">Order</label>
									<div class="controls">
										<input class="input-xlarge" id="orders" type="text" name="orders" value="'.$form->orders.'">
											<span class="help-inline">'.form_error('orders').'</span>
									</div>				
							</div>	
							<div class="control-group">
								<label class="control-label">Save to</label>
									<div class="controls">';
										//$fields_query 	= $this->db->query('SELECT * FROM '. $this->core_result->map .' ORDER BY id ASC ');
										$fields 		= $this->db->list_fields($this->core_result->map);
										$fields_options = array();
										foreach ($fields as $field)
										{
										   $fields_options[$field] = $field; 
										} 
										echo form_dropdown('field', $fields_options, $form->field, 'id="dropdown" class="selectpicker"');	
				echo'				</div>
							</div>	
							<div class="control-group">
								<label class="control-label">Field Type</label>
									<div class="controls">';
										$types_query 	= $this->db->query('SELECT * FROM '. $this->db->dbprefix("form_type") .' ORDER BY id ASC ');
										$types			= $types_query->result();
										$types_options 	= array();
										foreach ($types as $type)
										{
										   $types_options[$type->id] = $type->type;
										} 
										echo form_dropdown('type', $types_options, $form->type, 'id="dropdown" class="selectpicker"');
				echo'				</div>					
							</div>
							<div class="control-group">
								<label class="control-label">Default Value</label>
									<div class="controls">
										<input class="input-xlarge" id="defaults" type="text" name="defaults" value="'.$form->defaults.'">
											<span class="help-inline">'.form_error('defaults').'</span>
									</div>				
							</div>			
							<div class="control-group">
								<label class="control-label">Options</label>
									<div class="controls">
										<input class="input-xlarge" id="options" type="text" name="options" value="'.$form->options.'">
											<span class="help-inline">'.form_error('options').'</span>
									</div>				
							</div>	
						</div>
						<div class="modal-footer"> '.$this->updates.' </div>
						'.$this->gclose.'
					</div>
					';
				}	
					
echo'				
			
	</div>
</div>

';?>

