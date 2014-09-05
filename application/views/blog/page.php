<?php echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			<div class="row-fluid show-grid">
				<div class="span9">';
					//Blog Listing
					foreach ($this->result as $blog)
					{ 
						$format 	=  date("F d, Y", strtotime($blog->created));
						$content	= str_replace("\\r\\n", "<br/>", $blog->content); 
						
						//get author
						$a_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('users') . ' WHERE id = ' . $blog->author);
						$author		= $a_query->row();	
						
						echo '
						<div id="blog-view">
							<div class="blog-head">
								<h3>'.$blog->title.'</h3>
								Last Edited on '.$format.' by <a href="'.$this->base.'user/'.$author->id.'/'.$author->username.'/">'.$author->name.'</a> | Posted in : ---- 
							</div>	
							<div class="blog-body">
								<img src="'.$this->base.'media/blog/'.$blog->image.'" />
								<p>'.$content.'</p>
								<div class="clearfix"></div>
							</div>
							<div class="blog-footer">
								<div class="pull-right">
									<a class="btn btn-primary" href="'.$this->base.'blog/view/'.$blog->id.'/'.$blog->alias.'/"> <i class="fa fa-sign-out"></i> Read More </a>
								</div>	
							</div>
							<div class="clearfix"></div>
						</div>
					  ';		
					}
echo '			</div>
				<div class="span3">
					<div id="module">
						<div class="module-head">
							<h3>Sorting Options</h3>
							Sort articles by order
						</div>
						<div class="module-body">
							<a href="'.$this->base.'blog/sort/alphabetical/">Alphabetical</a>
							<a href="'.$this->base.'blog/sort/newest/">Newest</a>
							<a href="'.$this->base.'blog/sort/oldest/">Oldest</a>
						</div>
					</div>
					<div id="module">
						<div class="module-head">
							<h3>Category Options</h3>
							Filter articles by category
						</div>
						<div class="module-body">
							<a href="'.$this->base.'blog/sort/alphabetical/">Alphabetical</a>
							<a href="'.$this->base.'blog/sort/newest/">Newest</a>
							<a href="'.$this->base.'blog/sort/oldest/">Oldest</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
';?>