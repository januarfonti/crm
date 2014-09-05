<?php  
echo '
'.form_open('admin/config', $this->gform).'
	<div class="row-fluid lmargin">
		<div class="span12">
			'.$this->submit.'
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label">Site Name</label>
					<div class="controls">
						<input class="input-xxlarge" id="name" type="text" name="name" value="'.$this->con->name.'" placeholder="">
						<span class="help-inline">'.form_error('name').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Author</label>
					<div class="controls">
						<input class="input-xxlarge" id="author" type="text" name="author" value="'.$this->con->author.'" placeholder="">
						<span class="help-inline">'.form_error('author').'</span>
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Metadata</label>
					<div class="controls">
						<input class="input-xxlarge" id="metadata" type="text" name="metadata" value="'.$this->con->metadata.'" placeholder="">
						<span class="help-inline">'.form_error('metadata').'</span>
					</div>
			</div>
					<div class="control-group">
						<label class="control-label">Metakey</label>
						<div class="controls">
							<input class="input-xxlarge" id="metakey" type="text" name="metakey" value="'.$this->con->metakey.'" placeholder="">
							<span class="help-inline">'.form_error('metakey').'</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Copyright</label>
						<div class="controls">
							<input class="input-xxlarge" id="copyright" type="text" name="copyright" value="'.$this->con->copyright.'" placeholder="">
							<span class="help-inline">'.form_error('copyright').'</span>
						</div>
					</div>
					
				
		</div>
	</div>
'.$this->gclose.'	
';
?>
