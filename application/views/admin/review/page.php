<?php echo '
<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-toggle="modal" role="button" href="#add">
				<i class="fa fa-building-o"></i>
				<div class="info">Add+</div>
				</a>
			</div>
		</div>	
	</div>
</div>

					<div id="add" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Add New Reviews </h3>
						</div>
						
						'.form_open('admin/review/add/', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title" value="" >
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
							<th class="span4">Level</th>
							<th class="span3">Manage</th>
							<th class="span3">Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->items as $item)
					{	
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td>'.$item->title.'</td>
							<td><a class="btn btn-warning" href="'.$this->base.'admin/review/question/'.$item->id.'"> <i class="fa fa-inbox"></i> Question </a></td>
							<td>
								<a class="btn btn-primary" 	data-toggle="modal" role="button" href="#edit-'.$item->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" 	data-toggle="modal" role="button" href="#delete-'.$item->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				$i=0; foreach ($this->items as $item)
				{
					$i++;
					echo '
					<div id="edit-'.$item->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3> Edit Data User </h3>
						</div>
						
						'.form_open('admin/review/edit/'.$item->id.'', $this->gform).'
						<div class="modal-body">
								<div class="control-group">
									<label class="control-label">Levels</label>
									<div class="controls">
										<input class="input-xlarge" id="title" type="text" name="title" value="'.$item->title.'" >
									</div>
								</div>
						</div>
						<div class="modal-footer">
							'.$this->updates.'
						</div>
						
						'.$this->gclose.'
					</div>
										
					<div id="delete-'.$item->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
						'.form_open('admin/review/drop/'.$item->id.'', $this->gform).'
						<div class="modal-header">
							<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h3 id="myModalLabel1">Delete '.$item->title.'?</h3>
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