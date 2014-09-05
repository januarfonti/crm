<?php echo '
<div class="row-fluid">
	<div class="span12">
		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">#</span></th>
							<th class="span4">Customer</th>
							<th class="span3">Score</th>
							<th class="span3">Details</th>
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
							<td>'.$item->name.'</td>
							<td>'.$item->scores.'</td>
							<td><a class="btn btn-warning" href="'.$this->base.'admin/survey/'.$item->aid.'/review"> <i class="fa fa-inbox"></i> View </a></td>
							
							
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
										<input class="input-xlarge" id="title" type="text" name="title" value="'.$item->name.'" >
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
								<h3 id="myModalLabel1">Delete '.$item->name.'?</h3>
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