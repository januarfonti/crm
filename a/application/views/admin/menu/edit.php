<?php  
echo '
<div class="row-fluid">
	<div class="span12">
		<div class="widget green">
			<div class="widget-title">
				<h4> <i class="fa fa-menus"></i> menu Manager </h4>
			</div>
			<div class="widget-body">
				'.form_open('admin/menu/edit/'.$this->id.'', $this->gform).'
					<div class="control-group">
						<label class="control-label">Menu Title</label>
						<div class="controls">
							<input class="input-xxlarge" id="title" type="text" name="title" value="'.$this->menu->title.'" >
							<span class="help-inline">'.form_error('title').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<input class="input-xxlarge" id="status" type="text" name="status" value="'.$this->menu->status.'" >
							<span class="help-inline">'.form_error('status').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Permissions</label>
						<div class="controls">
							<input class="input-xxlarge" id="permission" type="text" name="permission" value="'.$this->menu->permission.'" >
							<span class="help-inline">'.form_error('permission').'</span>
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