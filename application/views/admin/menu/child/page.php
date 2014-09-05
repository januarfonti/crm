<?php echo '

<div class="row-fluid">
	<div class="span12">
		<div class="metro-nav metro-fix-view">
			<div class="metro-nav-block nav-deep-terques double">
				<a data-original-title="" href="'.$this->base.'admin/menu/">
				<i class="fa fa-bars"></i>
				<div class="info">Managers</div>
				</a>
			</div>
			
			<div class="metro-nav-block nav-light-purple double">
				<a data-original-title="" href="'.$this->base.'admin/menu/'.$this->data_core.'/child/add/">
				<i class="fa fa-th-list"></i>
				<div class="info">Add Child+</div>
				</a>
			</div>
			
		</div>	
	</div>
</div>

<div class="row-fluid">
	<div class="span12">		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							
							<th class="span1"> <i class="fa fa-sort-alpha-asc"></i> Order</th>
							<th class="span7"> <i class="fa fa-adn"></i> Title</th>
							<th class="span3"> <i class="fa fa-gear"></i> Option</th>
						</tr>
					</thead>
					<tbody>';
					
					//render menu data
					$n=0; foreach ($this->menu_result as $menu)
					{	
						$n++;
						echo '
						<tr>
							
							<td><span class="label label-info lblock">'.$menu->orders.'</span> </td>
							<td>'.$menu->title.'</td>
							<td>
								<a class="btn btn-primary" href="'.$this->base.'admin/menu/'.$this->data_core.'/child/edit/'.$menu->id.'"> <i class="fa fa-edit"></i> Edit </a>
								<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$menu->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
							</td>
							
						</tr>
						';
						
						//render sub-menu
						$child_query	= $this->db->query('SELECT * FROM '. $this->data_menu .' WHERE parent = '.$menu->id.' AND menu = ' . $this->data_core . ' ORDER BY orders ASC');
						$child_result	= $child_query->result();
						
						if ($child_result)
						{
							$i=0; foreach ($child_result as $child)
							{
							$i++;
							echo '
							<tr>
								
								<td> <span class="label label-success rblock"> --- '.$menu->orders.'.'.$child->orders.'</span> </td>
								<td>---- '.$child->title.'</td>
								<td>
									<a class="btn btn-primary" href="'.$this->base.'admin/menu/'.$this->data_core.'/child/edit/'.$child->id.'"> <i class="fa fa-edit"></i> Edit </a>
									<a class="btn btn-danger" data-toggle="modal" role="button" href="#delete-'.$child->id.'"> <i class="fa fa-trash-o"></i> Delete </a>
								</td>
								
							</tr>
							';
							}
							
						}
						
					}
echo '					
					</tbody>
				</table>';
				
				foreach ($this->menu_result as $menu)
				{
					echo '
					<div id="delete-'.$menu->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								'.form_open('admin/menu/'.$this->data_core.'/child/drop/'.$menu->id.'/', $this->gform).'
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3 id="myModalLabel1">Delete '.$menu->title.' ?</h3>
								</div>
								<div class="modal-body">
									<p><span class="label label-important">Warning!</span> This action cant be undone!</p>
								</div>
								<div class="modal-footer"> '.$this->drop.' </div>
								'.$this->gclose.'
					</div>
					';
					
					//render sub-menu
						$child_query	= $this->db->query('SELECT * FROM '. $this->data_menu .' WHERE parent = '.$menu->id.' AND menu = ' . $this->data_core);
						$child_result	= $child_query->result();
					
					if ($child_result)
						{
							foreach ($child_result as $child)
							{
							echo '
							<div id="delete-'.$child->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								'.form_open('admin/menu/'.$this->data_core.'/child/drop/'.$child->id.'/', $this->gform).'
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3 id="myModalLabel1">Delete '.$child->title.' ?</h3>
								</div>
								<div class="modal-body">
									<p><span class="label label-important">Warning!</span> This action cant be undone!</p>
								</div>
								<div class="modal-footer"> '.$this->drop.' </div>
								'.$this->gclose.'
							</div>
							';
							}
							
						}
				}	
					
echo'				
			
	</div>
</div>

';?>