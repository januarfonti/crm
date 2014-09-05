<?php echo '
<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-toggle="modal" role="button" href="#add">
				<i class="fa fa-user"></i>
				<div class="info">Add User+</div>
				</a>
			</div>
			<div class="metro-nav-block nav-light-purple double">
				<a data-original-title="" href="'.$this->base.'admin/user/level/">
				<i class="fa fa-users"></i>
				<div class="info">Levels</div>
				</a>
			</div>
		</div>	
	</div>
</div>

					<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New User </h3>
						</div>
						
						'.form_open('admin/user/add/', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">';
										$levels_query 		= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") . ' ORDER BY id ASC ');
										$levels				= $levels_query->result();
										$levels_options 	= array();
										foreach ($levels as $level)
										{
										   $levels_options[$level->id] = $level->levels;
										} 
										echo form_dropdown('level', $levels_options, 2, 'id="dropdown" class="selectpicker"');
			echo'					</div>				
								</div>
								<div class="control-group">
									<label class="control-label">Name</label>
									<div class="controls">
										<input class="input-xlarge" id="name" type="text" name="name"  >
										<span class="help-inline">'.form_error('name').'</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input class="input-xlarge" id="username" type="text" name="username"  >
										<span class="help-inline">'.form_error('username').'</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input class="input-xlarge" id="password" type="password" name="password">
										<span class="help-inline">'.form_error('password').'</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Status</label>
									<div class="controls">
										<input class="input-xlarge" id="status" type="text" name="status" >
										<span class="help-inline">'.form_error('status').'</span>
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
							<th class="span4">Name</th>
							<th class="span2">Level</th>
							<th class="span2">Username</th>
							<th class="span2">Status</th>
							<th class="span3">Option</th>
							
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->user_result as $user)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td><a href="'.$this->base.'user/profile/'.$user->uid.'">'.$user->name.'</a></td>
							<td>'.$user->levels.'</td>
							<td>'.$user->username.'</td>
							<td>';
							
								switch ($user->status) {
									case 0: echo '<a class="btn btn-warning"> <i class="fa fa-times-circle"></i> Non-Active </a>'; break;
									case 1: echo '<a class="btn btn-success"> <i class="fa fa-check"></i> Active </a>'; break;
									case 2: echo '<a class="btn btn-danger"> <i class="fa fa-times"></i> Blocked </a>'; break;	
								}								
						echo'	
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" role="button" href="#edit-'.$user->uid.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$user->uid.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				$i=0; foreach ($this->user_result as $user)
				{
					$i++;
					echo '
					<div id="edit-'.$user->uid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit Data User </h3>
						</div>
						
						'.form_open('admin/user/edit/'.$user->uid.'', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">';
										$levels_query 		= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") . ' ORDER BY id ASC ');
										$levels				= $levels_query->result();
										$levels_options 	= array();
										foreach ($levels as $level)
										{
										   $levels_options[$level->id] = $level->levels;
										} 
										echo form_dropdown('level', $levels_options, $user->level, 'id="dropdown" class="selectpicker"');
			echo'					</div>				
								</div>
								<div class="control-group">
									<label class="control-label">Name</label>
									<div class="controls">
										<input class="input-xlarge" id="name" type="text" name="name" value="'.$user->name.'" >
										<span class="help-inline">'.form_error('name').'</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input class="input-xlarge" id="username" type="text" name="username" value="'.$user->username.'" >
										<span class="help-inline">'.form_error('username').'</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input class="input-xlarge" id="password" type="password" name="password" placeholder="Click and set new password">
										<span class="help-inline">'.form_error('password').'</span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Status</label>
									<div class="controls">
										<input class="input-xlarge" id="status" type="text" name="status" value="'.$user->status.'" >
										<span class="help-inline">'.form_error('status').'</span>
									</div>
								</div>
								
								
										
						</div>
						<div class="modal-footer">
							'.$this->updates.'
						</div>
						
						'.$this->gclose.'
					</div>
					
					<div id="delete-'.$user->uid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/user/drop/'.$user->uid.'/', $this->gform).'
						<input id="id" type="hidden" name="id" value="'.$user->uid.'">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$user->name.' ?</h3>
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