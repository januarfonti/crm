<?php echo '
<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
			<a data-toggle="modal" role="button" href="/#add">
				<i class="fa fa-tasks"></i>
				<div class="info">Add+</div>
				</a>
			</div>
		</div>	
	</div>
</div>

					<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New Component </h3>
						</div>
						
						'.form_open('admin/asset/add/', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">
										<input class="input-xlarge" id="name" type="text" name="name" >
										<span class="help-inline">'.form_error('name').'</span>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->submit.'
						</div>
						
						'.$this->gclose.'
					</div>

<div class="row-fluid">
	<div class="span12">
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">Id</span></th>
							<th class="span5">Name</th>
							<th class="span2">Controller</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->comp_result as $comp)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$comp->id.'</td>
							<td>'.$comp->name.'</td>
							<td> <a class="btn btn-warning" href="'.$this->base.'admin/route/'.$comp->id.'/"> <i class="fa fa-th-list"></i> Routes </a> </td>
							<td>
								<a class="btn btn-primary" 	data-toggle="modal" role="button" href="#edit-'.$comp->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" 	data-toggle="modal" role="button" href="#delete-'.$comp->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				$i=0; foreach ($this->comp_result as $comp)
				{
					$i++;
					echo '
					<div id="edit-'.$comp->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> '.$comp->name.' </h3>
						</div>
						
						'.form_open('admin/asset/edit/'.$comp->id, $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Name</label>
									<div class="controls">
										<input class="input-xlarge" id="name" type="text" name="name" value="'.$comp->name.'">
										<span class="help-inline">'.form_error('name').'</span>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->updates.'
						</div>
						
						'.$this->gclose.'
					</div>
					
										
					<div id="delete-'.$comp->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/asset/drop/'.$comp->id, $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$comp->name.' ?</h3>
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
';
?>