<?php  
echo '
'.form_open('admin/menu/'.$this->data_core.'/child/add', $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			'.$this->submit.'
			<a class="btn btn-warning" href="'.$this->base.'admin/menu/'.$this->uri->segment(3).'/child/"> <i class="fa fa-mail-reply"></i> Cancel </a>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label">Parent</label>
					<div class="controls">';					
						$parent_options = array('0' => 'None');
						
						foreach ($this->parents_result as $parents)
							{ $parent_options[$parents->id] = $parents->title; }
						
						echo form_dropdown('parent', $parent_options, set_value('parent'), 'id="dropdown" class="selectpicker" data-live-search="true"');
echo '				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Orders</label>
					<div class="controls">
						<input class="input-xxlarge" id="orders" type="text" name="orders" value="'.set_value('orders').'" placeholder="">
						<span class="help-inline">'.form_error('orders').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Menu Title</label>
					<div class="controls">
						<input class="input-xxlarge" id="title" type="text" name="title" value="'.set_value('title').'" placeholder="">
						<span class="help-inline">'.form_error('title').'</span>
					</div>
			</div>
					<div class="control-group">
						<label class="control-label">Icon</label>
						<div class="controls">
							<input class="input-xxlarge" id="icon" type="text" name="icon" value="'.set_value('icon').'" placeholder="">
							<span class="help-inline">'.form_error('icon').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Links</label>
						<div class="controls">
							<input class="input-xxlarge" id="link" type="text" name="link" value="'.set_value('link').'" placeholder="">
							<span class="help-inline">'.form_error('link').'</span>
						</div>
					</div>
					
				
		</div>
	</div>
'.$this->gclose.'	
';
?>
