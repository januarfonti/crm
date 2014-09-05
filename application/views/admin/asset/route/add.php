<?php  
echo '
'.form_open('admin/route/'.$this->parents.'/add', $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			'.$this->submit.'
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label">Status</label>
					<div class="controls">
						<div class="btn-group stat" data-toggle="buttons-radio">
							<button type="button" value="0" class="btn btn-primary stat-1 active">Unpublished</button>
							<button type="button" value="1" class="btn btn-primary stat-1">Published</button>
						</div>
						<input type="hidden" id="status" class="stat-2" name="status" value="0"/>
					</div>				
			</div>
			<div class="control-group">
				<label class="control-label">Orders</label>
					<div class="controls">
						<input class="input-xxlarge" id="orders" type="text" name="orders">
						<span class="help-inline">'.form_error('orders').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Name</label>
					<div class="controls">
						<input class="input-xxlarge" id="name" type="text" name="name">
						<span class="help-inline">'.form_error('name').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Routes</label>
					<div class="controls">
						<input class="input-xxlarge" id="routes" type="text" name="routes">
						<span class="help-inline">'.form_error('routes').'</span>
					</div>
			</div>
			
			
		</div>
	</div>
'.$this->gclose.'	
';
?>
<script>
$(function() { $(".stat-1").click(function() { $(".stat-2").val($(this).val()); }); });
</script>