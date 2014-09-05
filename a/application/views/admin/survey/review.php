<?php echo '
<div class="row-fluid">
	<div class="span12">
		
				<table class="table table-striped table-bordered table-advance table-hover">
					<thead>
						<tr>
							<th class="span1">#</span></th>
							<th class="span9">Question</th>
							<th class="span1">Score</th>
						</tr>
					</thead>
					<tbody>';
						
						//explode data divided by space
						$rawdata	= rtrim($this->item->content);
						$restdata	= substr($rawdata, 0, -1);
						$explode	= explode(",", $restdata);
						
					$n=0; foreach ($explode as $item)
					{	
						
						//explode data divided by #
						$pieces		= explode("#", $explode[$n]);
						$qid		= $pieces[0];
						$score		= $pieces[1];
						
						$p_query 	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('review_question') . ' WHERE id = ' .$qid);
						$question	= $p_query->row();
		
						
						$n++;
						echo '
						<tr>
							<td>'.$n.'</td>
							<td>'.$question->question.'</td>
							<td>'.$score.'</td>
							
							
						</tr>
						';
					}
echo '					
					</tbody>
				</table>';
				
				
					
echo'				
			
	</div>
</div>

';?>