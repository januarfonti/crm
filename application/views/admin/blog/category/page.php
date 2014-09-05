<?php echo '
<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-toggle="modal" role="button" href="#add">
				<i class="fa fa-bookmark"></i>
				<div class="info">New+</div>
				</a>
			</div>
		</div>	
	</div>
</div>

					<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New Category </h3>
						</div>
						
						'.form_open('admin/blog/category/add', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Title</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title">
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->submit.'
						</div>
						
						'.$this->gclose.'
					</div>

<div class="row-fluid">
	<div class="span12">
		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">#</span></th>
							<th class="span7">Title</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->result as $data)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td>'.$data->title.'</td>
							<td>
								<a class="btn btn-primary" 	data-toggle="modal" role="button" href="#edit-'.$data->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" 	data-toggle="modal" role="button" href="#delete-'.$data->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>';
					}
echo '					
					</tbody>
				</table>';
				
				$n=0; foreach ($this->result as $data)
				{
					echo '
					<div id="edit-'.$data->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New Category </h3>
						</div>
						
						'.form_open('admin/blog/category/add', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Title</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title">
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->submit.'
						</div>
						
						'.$this->gclose.'
					</div>
						<div id="delete-'.$data->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('form/1/'.$data->id.'/drop', $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$data->title .' ?</h3>
						</div>
						<div class="modal-body">
							<p><span class="label label-important">Warning!</span> This action cant be undone!</p>
						</div>
						<div class="modal-footer"> '.$this->drop.' </div>
						'.$this->gclose.'
					</div>
					
					';
				}
					
echo'				
			
	</div>
</div>

';?>