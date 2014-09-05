<?php echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">';
		
			$format 	=  date("F d, Y", strtotime($this->content->created));
			$content	= str_replace("\\r\\n", "<br/>", $this->content->content); 
						
			$a_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('users') . ' WHERE id = ' . $this->content->author);
			$author		= $a_query->row();	
						
			echo '
			<div id="blog-view">
				<div class="blog-head">
					<h3>'.$this->content->title.'</h3>
					Last Edited on '.$format.' by <a href="'.$this->base.'user/'.$author->id.'/'.$author->username.'/">'.$author->name.'</a> | Posted in : ---- 
				</div>	
				<div class="blog-view-body">
					<img src="'.$this->base.'media/blog/'.$this->content->image.'" />
					<p>'.$content.'</p>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
					  ';		
echo '		
		</div>
	</div>
</div>
';?>