<?php  
echo '
'.form_open('admin/route/'.$this->parents.'/edit/'.$this->id, $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			'.$this->updates.'
			<a class="btn btn-warning" href="'.$this->base.'admin/route/'.$this->parents.'/"> <i class="fa fa-mail-reply"></i> Cancel </a>
			
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label">Status</label>
					<div class="controls">
						<div class="btn-group stat" data-toggle="buttons-radio">';
						switch ($this->comp->status)
						{
							case 0: 
								echo '
									<button type="button" value="0" class="btn btn-primary stat-1 active">Unpublished</button>
									<button type="button" value="1" class="btn btn-primary stat-1">Published</button>'; break;
							case 1: 
								echo '
									<button type="button" value="0" class="btn btn-primary stat-1">Unpublished</button>
									<button type="button" value="1" class="btn btn-primary stat-1 active">Published</button>'; break;
						}
echo '					</div>
						<input type="hidden" id="status" class="stat-2" name="status" value="'.$this->comp->status.'"/>
					</div>				
			</div>
			<div class="control-group">
				<label class="control-label">Orders</label>
					<div class="controls">
						<input class="input-xxlarge" id="orders" type="text" name="orders" value="'.$this->comp->orders.'" >
						<span class="help-inline">'.form_error('orders').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Name</label>
					<div class="controls">
						<input class="input-xxlarge" id="name" type="text" name="name" value="'.$this->comp->name.'" >
						<span class="help-inline">'.form_error('name').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Routes</label>
					<div class="controls">
						<input class="input-xxlarge" id="routes" type="text" name="routes" value="'.$this->comp->routes.'">
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