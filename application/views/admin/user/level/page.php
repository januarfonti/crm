<?php echo '
<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-toggle="modal" role="button" href="'.$this->base.'admin/user/level#add">
				<i class="fa fa-users"></i>
				<div class="info">Add Level+</div>
				</a>
			</div>
			<div class="metro-nav-block nav-light-purple double">
				<a data-original-title="" href="'.$this->base.'admin/user/">
				<i class="fa fa-user"></i>
				<div class="info">User</div>
				</a>
			</div>
		</div>	
	</div>
</div>

					<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New User Level </h3>
						</div>
						
						'.form_open('admin/user/level/add/', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">
										<input class="input-xlarge" id="levels" type="text" name="levels" value="'.set_value('levels').'" >
										<span class="help-inline">'.form_error('levels').'</span>
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
							<th class="span1">#</span></th>
							<th class="span7">Level</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->user_result as $level)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td>'.$level->levels.'</td>
							<td>
								<a class="btn btn-primary" 	data-toggle="modal" role="button" href="#edit-'.$level->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" 	data-toggle="modal" role="button" href="#delete-'.$level->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				$i=0; foreach ($this->user_result as $level)
				{
					$i++;
					echo '
					<div id="edit-'.$level->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit Data User </h3>
						</div>
						
						'.form_open('admin/user/level/edit/'.$level->id.'', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">
										<input class="input-xlarge" id="levels" type="text" name="levels" value="'.$level->levels.'" >
										<span class="help-inline">'.form_error('levels').'</span>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->updates.'
						</div>
						
						'.$this->gclose.'
					</div>
										
					<div id="delete-'.$level->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/user/level/drop/'.$level->id.'/', $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$level->levels.' ?</h3>
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