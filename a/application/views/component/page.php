<?php echo '
<div class="row-fluid">';
		$i=0; foreach ($this->assets as $assets)
		{
			$i++;
			if ($i <= 4)
			{ echo '
				<div class="span3">
					<h1>'.$assets->name.'</h1>
					<ul>';
						$comp_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('component') . ' WHERE parents = ' . $assets->id . ' AND status = 1 ORDER BY orders ASC');
						$comps		= $comp_query->result();	
						foreach ($comps as $comp)
						{
							echo '<li>'.$comp->name.'</li>';	
						}
echo '				</ul>
				</div>
				'; }
		}	
echo' 
</div>
';
?>