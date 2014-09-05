<?php 
$close = "window.location.href='#close'";
$this->admin_login_attribute = array('class' => '', 'id' => '', 'enctype' => 'multipart/form-data');
echo '
<!DOCTYPE html>
	<html lang="en">
		<head> 
			<title>'.$this->sconfig->name.' | Session Expired</title>
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta content="Lock Screen" name="description">
			<meta content="Dimas Seputro" name="author">
			<link href="'.$this->bootstrap.'favicon.png" rel="shortcut icon">
			<link href="'.$this->bootstrap.'css/bootstrap.css" rel="stylesheet" type="text/css">
		</head> 
		<body class="lock">
			'.form_open('admin/verify',$this->admin_login_attribute).'
			<div class="lock-header">
				<a class="center smooth"  href="#">
					'.$this->sconfig->name.'
				</a>
			</div>
			<div class="lock-wrap">
				<div class="metro single-size gray">
					<i class="fa fa-user"></i>
					<span>No Access</span>	
				</div>
				<div class="metro double-size blue">
					<div class="input-append lock-input">
						<input class="form-control" id="username" name="username" type="text" autofocus="" required="" placeholder="Username">
					</div>
				</div>
				<div class="metro double-size green">
					<div class="input-append lock-input">
						<input class="form-control" id="passowrd" name="password" type="password" required="" placeholder="Password">
						<button type="submit" class="btn tarquoise"><i class=" fa fa-arrow-right"></i></button>
					</div>
				</div>
				<div class="metro single-size terques">
					<div class="locked">
						<i class="fa fa-lock"></i>
						<span>Locked</span>
					</div>
				</div>
				<div class="metro double-size gray ">
					<h1>Session Expired</h1>
					<p>Please Login Again</p>
				</div>
				<div class="metro double-size orange">
					<a href="javascript:;" class="user-position">
						<i class="fa fa-key"></i>
						<span>Forgot Password ?</span>
					</a>
				</div>
			</div>
			'.$this->gclose.'
			
		<aside id="login-error" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> Slow Down Bro!! </h3>
				</div>
				<div class="modal-body">
					<span class="label label-important">You are warned!</span>
						Are you sure have access to this area?
				</div>
			</div>
		</aside>	
			
			<div id="footer"> &copy; '.date("Y").' '.$this->sconfig->name.' by  '.$this->sconfig->copyright.' . All Rights Reserved. 
				<div class="pull-right">
					<i class="fa fa-fire"></i> <b>CodeIgniter 2.1.4</b>  &ensp;
					<i class="fa fa-twitter"></i> <b>Bootstrap 3.0.2</b>
				</div>
			</div>
					
				<script src="'.$this->bootstrap.'js/jquery-1.js"></script>
				<script src="'.$this->bootstrap.'js/bootstrap.js"></script>
				<script src="'.$this->bootstrap.'js/jquery.js"></script>
				<script src="'.$this->bootstrap.'js/common-scripts.js"></script>
				<script src="'.$this->bootstrap.'js/jquery_002.js"></script>
	
</body>
</html>
';
?>