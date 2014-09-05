<?php
$this->admin_login_attribute = array('class' => '', 'id' => '', 'enctype' => 'multipart/form-data');

echo '
<div class="lock-header">
	<a id="logo" class="center" href="index.html">
		
	</a>
</div>

<div class="login-wrap">
	<div class="metro single-size red">
		<div class="locked">
			<i class="fa fa-lock"></i>
				<span>Login</span>
		</div>
	</div>
	
	'.form_open('admin/verify',$this->admin_login_attribute).'
	<div class="metro double-size green">	
		<div class="input-append lock-input">
			<input class="form-control" id="username" name="username" type="text" autofocus="" required="" placeholder="Username">
		</div>		
	</div>
	
	
	<div class="metro double-size yellow">
		<div class="input-append lock-input">
			<input class="form-control" id="passowrd" name="password" type="password" required="" placeholder="Password">
		</div>
	</div>
	
	<div class="metro single-size terques login">
		<button class="btn login-btn" type="submit">
			Sign In
			<i class=" fa fa-long-arrow-right"></i>
		</button>
	</div>	
	
	</form>
</div>	
';
?>