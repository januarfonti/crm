 <?php 
$current_url 	= uri_string();
$pieces 		= explode("/", $current_url); 
echo '
	<div class="row-fluid page-heading">
		<div class="span12">
			<div class="pad20"><h1>'.ucfirst($site_title).'</h1></div>
		</div>
	</div>	
	<ul class="breadcrumb">
		<li> <b> You are here : </b></li>
	';	
		$n=-1; foreach ($pieces as $piece)
		{
			$n++;
			switch ($n)
			{
				case 0 : $blink = $pieces[$n]; break;
				case 1 : $blink = $pieces[$n-1] .'/'. $pieces[$n]; break;
				case 2 : $blink = $pieces[$n-2] .'/'. $pieces[$n-1] .'/'. $pieces[$n]; break;
				case 3 : $blink = $pieces[$n-3] .'/'. $pieces[$n-2] .'/'. $pieces[$n-1] .'/'. $pieces[$n]; break;
				case 4 : $blink = $pieces[$n-4] .'/'. $pieces[$n-3] .'/'. $pieces[$n-2] .'/'. $pieces[$n-1] .'/'. $pieces[$n]; break;
				case 5 : $blink = $pieces[$n-5] .'/'. $pieces[$n-4] .'/'. $pieces[$n-3] .'/'. $pieces[$n-2] .'/'. $pieces[$n-1] .'/'. $pieces[$n]; break;
				case 6 : $blink = $pieces[$n-6] .'/'. $pieces[$n-5] .'/'. $pieces[$n-4] .'/'. $pieces[$n-3] .'/'. $pieces[$n-2] .'/'. $pieces[$n-1] .'/'.$pieces[$n]; break;
				case 7 : $blink = $pieces[$n-7] .'/'. $pieces[$n-6] .'/'. $pieces[$n-5] .'/'. $pieces[$n-4] .'/'. $pieces[$n-3] .'/'. $pieces[$n-2] .'/'. $pieces[$n-1] .'/'. $pieces[$n]; break;	
			}
			
			if ( is_numeric($pieces[$n]) ) { }
			else {
				echo '
				<li>
					<a href="'.$this->base.''.$blink.'/">'.ucfirst($pieces[$n]).'</a> <span class="divider">/</span>
				</li>
				'; 
			}
			
			
		}
echo'	
		<li class="pull-right">
			<i class="fa fa-fire"></i> <b>CodeIgniter 2.1.4</b>
		</li>
	</ul>
	
 ';?>
 
 
 
 