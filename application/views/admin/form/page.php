<?php echo '
<div class="row-fluid">
	<div class="span3">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a 	data-toggle="modal" role="button" href="'.$this->base.'admin/form#add">
				<i class="fa fa-th-list"></i>
				<div class="info">Add Form+</div>
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
						
		'.form_open('admin/form/add/', $this->gform).'
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label">Name</label>
					<div class="controls">
						<input class="input-xlarge" id="name" type="text" name="name">
							<span class="help-inline">'.form_error('name').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mapping</label>
					<div class="controls">';
						$tables = $this->db->list_tables();
						$tables_options = array();
						foreach ($tables as $table) { $tables_options[$table] = $table; }
						echo form_dropdown('map', $tables_options, set_value('map'), 'id="dropdown" class="selectpicker"');
echo'				</div>
			</div>	
			<div class="control-group">
				<label class="control-label">Succes Page</label>
					<div class="controls">
						<input class="input-xlarge" id="success" type="text" name="success">
							<span class="help-inline">'.form_error('success').'</span>
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
							<th class="span1">#</span></th>
							<th class="span5">Forms</th>
							<th class="span2">Fields Manager</th>
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
							<td>'.$n.'</td>
							<td>'.$form->name.'</td>
							<td> <a class="btn btn-warning" href="'.$this->base.'admin/form/'.$form->id.'/field"> <i class="fa fa-th-list"></i>Manage </a> </td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" role="button" href="'.$this->base.'admin/form/#edit-'.$form->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$form->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
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
					<div id="edit-'.$form->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit Form </h3>
						</div>
										
						'.form_open('admin/form/'.$form->id.'/edit', $this->gform).'
						<div class="modal-body">
							<div class="control-group">
								<label class="control-label">Name</label>
									<div class="controls">
										<input class="input-xlarge" id="name" type="text" name="name" value="'.$form->name.'">
											<span class="help-inline">'.form_error('name').'</span>
									</div>
							</div>
							<div class="control-group">
								<label class="control-label">Mapping</label>
									<div class="controls">';
										$tables = $this->db->list_tables();
										$tables_options = array();
										foreach ($tables as $table) { $tables_options[$table] = $table; }
										echo form_dropdown('map', $tables_options, $form->map, 'id="dropdown" class="selectpicker"');
				echo'				</div>
							</div>	
							<div class="control-group">
								<label class="control-label">Succes Page</label>
									<div class="controls">
										<input class="input-xlarge" id="success" type="text" name="success" value="'.$form->success.'">
											<span class="help-inline">'.form_error('success').'</span>
									</div>
							</div>
							
						</div>
						<div class="modal-footer"> '.$this->updates.' </div>
						'.$this->gclose.'
					</div>
					<div id="delete-'.$form->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/form/'.$form->id.'/drop', $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$form->name.' ?</h3>
						</div>
						<div class="modal-body">
							<p><span class="label label-important">Warning!</span> This action cant be undone!</p>
						</div>
						<div class="modal-footer"> '.$this->drop.' </div>
						'.$this->gclose.'
					</div>
					';
				}	
					
echo'				
			
	</div>
</div>

';?>

<script>
	 window.onload=function(){
 $('.selectpicker').addClass('mydropdown-forms').selectpicker('setStyle');

}; 
</script>