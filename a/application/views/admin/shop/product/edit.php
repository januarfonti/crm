<?php  
echo '
'.form_open_multipart('admin/shop/product/edit/'.$this->id, $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			<div class="pull-right">
				<a class="btn btn-warning" href="'.$this->base.'admin/blog/">
					<i class="fa fa-mail-reply"></i> Cancel
				</a>
				'.$this->submit.'
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			
			<input id="created" type="hidden" name="created" value="'.$this->current_time.'">
			<input id="author" type="hidden" name="author" value="'.$this->userid.'">
			
			<div class="control-group">
				<label class="control-label">Title</label>
					<div class="controls">
						<input class="input-xxlarge" id="title" type="text" name="title" >
						<span class="help-inline">'.form_error('title').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Category</label>
					<div class="controls">
						<input class="input-xxlarge" id="catid" type="text" name="catid" >
						<span class="help-inline">'.form_error('catid').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Price</label>
					<div class="controls">
						<input class="input-xxlarge" id="price" type="text" name="price" > IDR
						<span class="help-inline">'.form_error('price').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Discount</label>
					<div class="controls">
						<input class="input-xxlarge" id="discount" type="text" name="discount" > %
						<span class="help-inline">'.form_error('discount').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Image</label>
					<div class="controls">
						<div data-provides="fileupload" class="fileupload fileupload-new">
							<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
								<img alt="" src="'.$this->base.'media/default.gif">
							</div>
							<div style="max-width: 300px; max-height: 250px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
							<div>
								<span class="btn btn-file btn-success"> 
								<span class="fileupload-new"> <i class="fa fa-upload"></i> Browse </span>
								<span class="fileupload-exists"> <i class="fa fa-reply-all"></i> Change </span>
								<input type="file" id="image" name="image" class="default"></span>
								<a data-dismiss="fileupload" class="btn fileupload-exists btn-danger" href="#"> <i class="fa fa-times"></i> Remove</a>
							</div>
						</div>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Description</label>
					<div class="controls">
						<textarea id="description" class="span6 " rows="8" name="description"></textarea>
					</div>
			</div>
			
		</div>
	</div>
'.$this->gclose.'	
';
?>
