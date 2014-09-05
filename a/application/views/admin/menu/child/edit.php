<?php  
echo '
'.form_open('admin/menu/'.$this->core.'/child/edit/'.$this->id.'', $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			'.$this->updates.'
			<a class="btn btn-warning" href="'.$this->base.'admin/menu/'.$this->uri->segment(3).'/child/"> <i class="fa fa-mail-reply"></i> Cancel </a>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label">Parent</label>
					<div class="controls">';					
						$parent_options = array(
								'0' => '',
						);
							foreach ($this->parents_result as $parents)
							{
								$parent_options[$parents->id] = $parents->title; 
							}
						//echo form_dropdown('parent', $parent_options, set_value('parent'), 'id="dropdown"');
						echo form_dropdown('parent', $parent_options, $this->menu->parent, 'id="dropdown" class="selectpicker" data-live-search="true"');
echo '				</div>
			</div>
					<div class="control-group">
						<label class="control-label">Orders</label>
						<div class="controls">
							<input class="input-xxlarge" id="orders" type="text" name="orders"  value="'.$this->menu->orders.'" >
							<span class="help-inline">'.form_error('orders').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Title</label>
						<div class="controls">
							<input class="input-xxlarge" id="title" type="text" name="title" value="'.$this->menu->title.'" >
							<span class="help-inline">'.form_error('title').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Icon</label>
						<div class="controls">
							<input class="input-xxlarge" id="icon" type="text" name="icon" value="'.$this->menu->icon.'" >
							<span class="help-inline">'.form_error('icon').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Link</label>
						<div class="controls">
							<input class="input-xxlarge" id="link" type="text" name="link" value="'.$this->menu->link.'" >
							<span class="help-inline">'.form_error('link').'</span>
						</div>
					</div>
				
		</div>
	</div>
'.$this->gclose.'	
';









?>