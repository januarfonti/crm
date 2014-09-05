<?php  

	//Get user data from database
	$query	= $this->db->query( 'SELECT * FROM ' . $this->database . ' WHERE id = ' . $this->id );
	$user	= $query->row();

echo '
<div class="row-fluid">
	<div class="span12">
		<div class="widget green">
			<div class="widget-title">
				<h4> <i class="fa fa-users"></i> User Manager </h4>
			</div>
			<div class="widget-body">
				'.form_open('admin/user/edit/'.$this->id.'', $this->gform).'
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input class="input-xxlarge" id="name" type="text" name="name" value="'.$user->name.'" >
							<span class="help-inline">'.form_error('name').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input class="input-xxlarge" id="username" type="text" name="username" value="'.$user->username.'" >
							<span class="help-inline">'.form_error('username').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input class="input-xxlarge" id="password" type="password" name="password" value="'.set_value('password').'" placeholder="">
							<span class="help-inline">'.form_error('password').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Levels</label>
						<div class="controls">';
							$levels_query 		= $this->db->query('SELECT * FROM '. $this->db->dbprefix("users_level") .' ORDER BY id ASC ');
							$level				= $levels_query->result();
							$levels_options 	= array();
							foreach ($levels as $level)
							{
							   $levels_options[$level->id] = $tlevel->level;
							} 
							echo form_dropdown('level', $levels_options, $user->level, 'id="dropdown" class="selectpicker"');
echo'					</div>			
						
					</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<input class="input-xxlarge" id="status" type="text" name="status" value="'.$user->status.'" >
							<span class="help-inline">'.form_error('status').'</span>
						</div>
					</div>
					'.form_submit($this->gsave).'
				'.$this->gclose.'	
			</div>
		</div>
	</div>
</div>
';

?>