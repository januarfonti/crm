<?php
$close = "window.location.href='#close'";
if ($description) $desc = $description; else $desc = $this->sconfig->metadata; 
if ($keywords) $metakey = $keywords; else $metakey = $this->sconfig->metakey; 
if ($author) $auth = $author; else $auth = $this->sconfig->author; 

echo '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html lang="en">
		<head> 
			<title>'.$this->sconfig->name.' | '.$site_title.'</title>
			<meta content="'.$auth.'" name="author">
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta content="'.$desc.'" name="description">
			<meta content="'.$metakey.'" name="keywords">
			<link href="'.$this->bootstrap.'favicon.png" rel="shortcut icon">
			<link href="'.$this->bootstrap.'css/bootstrap.css" rel="stylesheet" type="text/css">
			<script src="'.$this->bootstrap.'js/jquery-1.js"></script>
		</head> 
		<body class="fixed-top">';
			echo '
				'.$header.'			
				<div class="container">
					<div id="container" class="row-fluid">					
						'.$content_body.'
					</div>
				</div>	
			
		<aside id="saved" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> Aww Yess! </h3>
				</div>
				<div class="modal-body">
					<span class="label label-success">Relax</span>
					Your data has been saved!
				</div>
			</div>
		</aside>	
		<aside id="updated" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> We did it! </h3>
				</div>
				<div class="modal-body">
					<span class="label label-success">Alright!</span>
					Your data has been Updated!
				</div>
			</div>
		</aside>	
		<aside id="deleted" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> Goodbye Poor Data Boy  </h3>
				</div>
				<div class="modal-body">
					<span class="label label-important">Alright!</span>
					Your data has been Deleted!
				</div>
			</div>
		</aside>	
		<aside id="error" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> Oh Noo! </h3>
				</div>
				<div class="modal-body">
					<span class="label label-important">Nation of fire attacked!</span>
					Something went wrong, please try again later!
				</div>
			</div>
		</aside>
		<aside id="cart-added" class="modalbox">
			<div>
				<div class="modal-header">
					<button class="close" onclick="window.location.href='.$close.'" type="button">×</button> 
					<h3> Aww Yess! </h3>
				</div>
				<div class="modal-body">
					<span class="label label-success">Relax</span>
					Your item has been added to cart
				</div>
			</div>
		</aside>		
		';
		
		echo '	
			<div id="footer"> &copy; '.date("Y").' '.$this->sconfig->name.' by  '.$this->sconfig->copyright.' . All Rights Reserved. 
				<div class="pull-right">
					<i class="fa fa-fire"></i> <b>CodeIgniter 2.1.4</b>  &ensp;
					<i class="fa fa-twitter"></i> <b>Bootstrap 3.0.2</b>
				</div>
			</div>
				
				<script type="text/javascript">
					window.onload=function(){ $(".selectpicker").selectpicker(); }
				</script>
				
				<script type="text/javascript" src="'.$this->bootstrap.'js/bootstrap.js"></script>
				<script type="text/javascript" src="'.$this->bootstrap.'js/bootstrap-select.min.js"></script>
				<script type="text/javascript" src="'.$this->bootstrap.'js/common-scripts.js"></script>
				<script type="text/javascript" src="'.$this->bootstrap.'js/jquery.js"></script>
				<script type="text/javascript" src="'.$this->bootstrap.'js/jquery.toggle.buttons.js"></script>
				<script type="text/javascript" src="'.$this->bootstrap.'js/jquery_002.js"></script>
				
				
				<script type="text/javascript" src="'.$this->bootstrap.'assets/bootstrap/js/bootstrap-fileupload.js"></script>
				
				
				
				
		</body>
	</html>
';
?>

