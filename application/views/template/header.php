<?php echo '
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
				<a class="brand tlogo smooth" href="'.$this->base.'">'.$this->sconfig->name.' </a>
   
				<div class="nav-collapse collapse">
					<ul class="nav front-top">
						<li> <a href="'.$this->base.'blog/">Blog</a> </li>
						<li> <a href="'.$this->base.'shop/">Shop</a> </li>
						<li> <a href="'.$this->base.'contact/">Contact</a> </li>
						<li> <a href="'.$this->base.'about/">About</a> </li>
					</ul>
					<ul class="nav pull-right top-menu">';
					if ($this->userid <> 0)
					{
						//Product Query
						$ca_database	= $this->db->dbprefix('shop_cart');		
						$ca_query		= $this->db->query('SELECT * FROM '. $ca_database .' WHERE userid = '. $this->userid);
						$ca_count		= $ca_query->num_rows();
						
						if ($ca_count >= 1) $badge = '<span class="badge badge-important">'.$ca_count.'</span>';
						else $badge = '';
						
						echo '
						<li class="dropdown mtop5 notify-row">
							<a class="dropdown-toggle element" data-original-title="View Carts" href="'.$this->base.'shop/carts/" data-toggle="tooltip" data-placement="bottom">
								<i class="fa fa-shopping-cart"></i>
								'.$badge.'
							</a>
						</li>
						';
					}
					
echo '				<li class="dropdown mtop5">
						<a class="dropdown-toggle element" data-original-title="Help / FAQ" href="#" data-toggle="tooltip" data-placement="bottom">
							<i class="fa fa-headphones "></i>
						</a>
					</li>
					<li class="dropdown mtop5">';
						if ($this->userid == 0)
							echo '
								<a data-toggle="modal" role="button" href="'.$this->base.'#login">
									<span class="dropdown-toggle"><i class="fa fa-sign-in "></i></span> Login
								</a>
							'; 
						else
							echo '
								<a href="'.$this->base.'logout">
									<span class="dropdown-toggle"><i class="fa fa-power-off"></i></span> Log Out
								</a>
							';
						
echo '				</li>
					</ul>
				</div>
			</div>
		</div>
    </div>
	
	<div id="login" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
		<div class="modal-header">
			<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h3> Login to '.$this->sconfig->name.' </h3>
		</div>		
		'.form_open('verify', $this->gform).'
		<div class="modal-body">
			<div class="control-group">
				<label class="control-label">Username</label>
					<div class="controls">
						<input class="input-xlarge" id="username" type="text" name="username" >
					</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>
					<div class="controls">
						<input class="input-xlarge" id="password" type="password" name="password" >
					</div>
			</div>
		</div>
		<div class="modal-footer"> '.$this->submit.'</div>
		'.$this->gclose.'
	</div>
';?>

			   
			   
          