<?php 

$this->db->from($this->db->dbprefix('review_answer'));
$this->db->where('uid', $this->userid);
$akses = $this->db->count_all_results();



echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			
			<div class="row-fluid show-grid">
				<div class="span12">
					<div id="module">
						<h2>Reviews</h2>
					</div>
				</div>
			</div>';
			
			switch ($akses)
			{
			case 0 : echo '		
			<div class="row-fluid show-grid">
				<div class="span12">
					'.form_open('review/'.$this->rid.'/add', $this->gform).'
					<div id="reviews">';
						foreach ($this->items as $item)
						{
							echo '
							<div id="question">
								<div class="asks">'.$item->question . '</div>
								<div class="btn-group" data-toggle="buttons-radio">';
								for ($i = 1; $i <= $item->score; $i++) 
								{
									echo '<button type="button" value="'.$i.'" class="btn stat-'.$item->id.'-1">'.$i.'</button>';
								}
echo '							</div>
								<input type="hidden" id="'.$item->id.'" class="stat-'.$item->id.'-2" name="'.$item->id.'" value=""/>
							</div>';
						}			
						foreach ($this->items as $item)
						{
							echo '
								<script> $(function() { $(".stat-'.$item->id.'-1").click(function() { $(".stat-'.$item->id.'-2").val($(this).val()); }); }); </script>
							';
						}
echo '				
						'.$this->submit.'
					</div>
					'.$this->gclose.'
				</div>
			</div>';
		
		case 1 : echo '<div id="module">you already submit review</div>'; break;
}
echo '		
		</div>
	</div>
</div>	';


			

?>

