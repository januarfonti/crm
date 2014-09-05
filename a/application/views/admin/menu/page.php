<?php echo '

<div class="row-fluid">
	<div class="span3">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-toggle="modal" role="button" href="#add">
				<i class="fa fa-th-list"></i>
				<div class="info">Add Menu+</div>
				</a>
			</div>
		</div>	
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
			<div class="modal-header">
				<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
					<h3> Add New Core Menu </h3>
			</div>
			'.form_open('admin/menu/add', $this->gform).'
			<div class="modal-body">
				<div class="control-group">
					<label class="control-label">Permissions</label>
					<div class="controls">';
						$levels_query 		= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") . ' ORDER BY id ASC ');
						$levels				= $levels_query->result();
						$levels_options 	= array();
						foreach ($levels as $level) { $levels_options[$level->id] = $level->levels; } 
						echo form_dropdown('permission', $levels_options, 2, 'id="dropdown" class="selectpicker"');
echo '				</div>		
				</div>
				<div class="control-group">
					<label class="control-label">Menu Title</label>
						<div class="controls">
							<input class="input-xlarge" id="title" type="text" name="title">
						</div>
				</div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<input class="input-xlarge" id="status" type="text" name="status">
					</div>
				</div>
			</div>
			<div class="modal-footer">'.$this->submit.' </div>
			'.$this->gclose.'
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">#</span></th>
							<th class="span5">Name</th>
							<th class="span2">Child Manager</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->menu_result as $menu)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td>'.$menu->title.'</td>
							<td> <a class="btn btn-warning" href="'.$this->base.'admin/menu/'.$menu->id.'/child"> <i class="fa fa-th-list"></i> Manage </a> </td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" role="button" href="#update-'.$menu->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$menu->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				$i=0; foreach ($this->menu_result as $menu)
				{
					$i++;
					echo '
					<div id="update-'.$menu->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit '.$menu->title.' menu </h3>
						</div>
						'.form_open('admin/menu/edit/'.$menu->id.'', $this->gform).'
						<div class="modal-body">
							<div class="control-group">
								<label class="control-label">Permissions</label>
								<div class="controls">';
									$levels_query 		= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") . ' ORDER BY id ASC ');
									$levels				= $levels_query->result();
									$levels_options 	= array();
									foreach ($levels as $level) { $levels_options[$level->id] = $level->levels; } 
									echo form_dropdown('permission', $levels_options, $menu->permission, 'id="dropdown" class="selectpicker"');
			echo '				</div>		
							</div>
							<div class="control-group">
								<label class="control-label">Menu Title</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title" value="'.$menu->title.'" >
									</div>
							</div>
							<div class="control-group">
								<label class="control-label">Status</label>
								<div class="controls">
									<input class="input-xlarge" id="status" type="text" name="status" value="'.$menu->status.'" >
								</div>
							</div>
						</div>
						<div class="modal-footer">'.$this->updates.' </div>
						'.$this->gclose.'
					</div>
					
					<div id="delete-'.$menu->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/menu/drop/'.$menu->id.'/', $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$menu->title.' ?</h3>
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