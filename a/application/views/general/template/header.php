<?php echo '
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
     
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
     
			<a class="brand tlogo smooth" href="#">'.$this->sconfig->name.'</a>
     
		<div class="nav-collapse collapse">
			<ul class="nav top-menu pull-left">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Link</a>
				</li>
				<li>
					<a href="#">Link</a>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" href="#" data-toggle="dropdown"> Dropdown <b class="caret"></b> </a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
							<li class="divider"></li>
							<li class="nav-header">Nav header</li>
						<li>
							<a href="#">Separated link</a>
						</li>
						<li>
							<a href="#">One more separated link</a>
						</li>
					</ul>
				</li>
</ul>

<form class="navbar-search pull-left" action="#">
<input class="search-query input-medium" type="text" placeholder="Search">
</form>

<ul class="nav pull-right top-menu">
<li>
<a href="#">Link</a>
</li>

<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">
Dropdown
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li>
<a href="#">Action</a>
</li>
<li>
<a href="#">Another action</a>
</li>
<li>
<a href="#">Something else here</a>
</li>
<li class="divider"></li>
<li>
<a href="#">Separated link</a>
</li>
</ul>
</li>
</ul>
    </div>
     
    </div>
    </div>
    </div>
';
?>