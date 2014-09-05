<?php  
echo '
<div class="row-fluid">
	<div class="span12">
		<div class="widget green">
			<div class="widget-title">
				<h4> <i class="fa fa-users"></i> User Manager </h4>
			</div>
			<div class="widget-body">
				'.form_open('admin/user/add', $this->gform).'
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input class="input-xxlarge" id="name" type="text" name="name" value="'.set_value('name').'" placeholder="User Full Name">
							<span class="help-inline">'.form_error('name').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input class="input-xxlarge" id="username" type="text" name="username" value="'.set_value('username').'" placeholder="">
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
						<div class="controls">
							<input class="input-xxlarge" id="level" type="text" name="level" value="'.set_value('level').'" placeholder="">
							<span class="help-inline">'.form_error('level').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<input class="input-xxlarge" id="status" type="text" name="status" value="'.set_value('status').'" placeholder="">
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