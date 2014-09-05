<?php 
if ($this->session_data)
{
//Get Menu Permission
$nav1_query		= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu') .' WHERE permission = ' . $this->user_level);
$nav1_result	= $nav1_query->row();	

$nav2_query		= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu_child') .' WHERE parent = 0 AND menu = ' . $nav1_result->id . ' ORDER BY orders ASC');
$nav_result		= $nav2_query->result();	

//segments
$c1 = $this->uri->segment(1);
$c2 = $this->uri->segment(2);
$c3 = $c1.'/'.$c2;
$ts	= $this->uri->total_segments();

echo '<ul class="sidebar-menu">';	
foreach ($nav_result as $nav)	
	{	
		$child_query	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu_child') .' WHERE parent = '.$nav->id.' AND menu = ' . $nav1_result->id);
		$child_result	= $child_query->result();	
		
		if ($nav->id == 5)
			{
				$menu_query	 = $this->db->query('SELECT * FROM '. $this->db->dbprefix('menu') . ' ORDER BY id ASC ');
				$menu_result = $menu_query->result(); 
			}		
		if ($child_result)
		{
			if($nav->link == $c2) $class = 'active'; else $class ='';
			echo '	<li class="sub-menu '.$class.'">
						<a href="javascript:;" class="">
							<i class="fa fa-'.$nav->icon.'"></i>
								<span>'.$nav->title.'</span>
									<span class="arrow"></span>
						</a>';	
			echo '		<ul class="sub">';
			foreach ($child_result as $child) { echo '
							<li><a class="" href="'.$this->base.''.$child->link.'">'.$child->title.'</a></li>'; }
							
			if ($nav->id == 5)
				{
					foreach ($menu_result as $menu) { echo '
						<li><a class="" href="'.$this->base.'admin/menu/'.$menu->id.'/child">'.$menu->title.'</a></li>'; }		
				}				
			echo '		</ul>
					</li>';	
		}
		else
		{
			if($nav->link == $c3) $class = 'active'; else $class ='';
			echo '	<li class="sub-menu '.$class.'">
						<a href="'.$this->base.''.$nav->link.'" ">
							<i class="fa fa-'.$nav->icon.'"></i>
								<span>'.$nav->title.'</span>
						</a>';	
		}
	}
echo '</ul>';
}	
?>