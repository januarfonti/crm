<?php echo 

form_open_multipart('upload/do_upload', $this->gform) .'
<div class="control-group">
                                    <label class="control-label">Image Upload</label>
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
						<label class="control-label">Name</label>
						<div class="controls">
							<input class="input-xxlarge" id="name" type="text" name="name" value="'.set_value('name').'" placeholder="User Full Name">
							<span class="help-inline">'.form_error('name').'</span>
						</div>
					</div> 
					
					
				'.$this->submit.'
				'.$this->gclose;	 ?>								
							