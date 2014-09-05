<?php 
echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			<div class="row-fluid show-grid">
				<div class="span12">
						<div id="module">
							<div class="progress">
								<div class="bar" style="width: 75%;"></div>
							</div>
							<span class="pull-right"><h1>75%</h1></span>
							<h2>Step 3 - Confirm Orders</h2>
						</div>
						
						<div class="row-fluid show-grid">
							<div class="span6">
								<div id="module">
									<div class="module-head">
										<a href="#name" data-toggle="modal" role="button" class="pull-right btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
										<h3><i class="fa fa-user"></i> Name </h3>
									</div>
									<div class="module-body">';
										if(!empty($this->usr->name)) echo $this->usr->name;  else  echo 'Please Edit Your Information'; echo '	
								</div>
								</div>	
								
								<div id="module">
									<div class="module-head">
										<a href="#address" data-toggle="modal" role="button" class="pull-right btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
										<h3><i class="fa fa-home"></i> Address </h3>
									</div>
									<div class="module-body">';
										if(!empty($this->usr->address)) echo $this->usr->address;  else  echo 'Please Edit Your Information'; echo '	
									</div>
								</div>	
								
								<div id="module">
									<div class="module-head">
										<a href="#phone" data-toggle="modal" role="button" class="pull-right btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
										<h3><i class="fa fa-mobile"></i> Phone </h3>
									</div>
									<div class="module-body">';
										if(!empty($this->usr->phone)) echo $this->usr->phone;  else  echo 'Please Edit Your Information'; echo '	
									</div>
								</div>
								
								<div id="module">
									<div class="module-head">
										<a href="#email" data-toggle="modal" role="button" class="pull-right btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
										<h3><i class="fa fa-envelope"></i> Email </h3>
									</div>
									<div class="module-body">';
										if(!empty($this->usr->email)) echo $this->usr->email;  else  echo 'Please Edit Your Information'; echo '	
									</div>
								</div>
							</div>
							
							
							<div id="name" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3> Edit Name </h3>
								</div>
								'.form_open('user/edit/name', $this->gform).'
								<div class="modal-body">
										<div class="control-group">
											<label class="control-label">Name</label>
											<div class="controls">
												<input class="input-xlarge" id="name" type="text" name="name" value="'.$this->usr->name.'" >
											</div>
										</div>
								</div>
								<div class="modal-footer">
									'.$this->updates.'
								</div>
								
								'.$this->gclose.'
							</div>
							
							
							<div id="address" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3> Edit Address </h3>
								</div>
								'.form_open('user/edit/address', $this->gform).'
								<div class="modal-body">
										<div class="control-group">
											<label class="control-label">Address</label>
											<div class="controls">
												<input class="input-xlarge" id="address" type="text" name="address" value="'.$this->usr->address.'" >
											</div>
										</div>
								</div>
								<div class="modal-footer">
									'.$this->updates.'
								</div>
								
								'.$this->gclose.'
							</div>
							
							<div id="phone" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3> Edit phone </h3>
								</div>
								'.form_open('user/edit/phone', $this->gform).'
								<div class="modal-body">
										<div class="control-group">
											<label class="control-label">Phone Number</label>
											<div class="controls">
												<input class="input-xlarge" id="phone" type="text" name="phone" value="'.$this->usr->phone.'" >
											</div>
										</div>
								</div>
								<div class="modal-footer">
									'.$this->updates.'
								</div>
								
								'.$this->gclose.'
							</div>
							
							<div id="email" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
								<div class="modal-header">
									<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
										<h3> Edit email </h3>
								</div>
								'.form_open('user/edit/email', $this->gform).'
								<div class="modal-body">
										<div class="control-group">
											<label class="control-label">Email</label>
											<div class="controls">
												<input class="input-xlarge" id="email" type="text" name="email" value="'.$this->usr->email.'" >
											</div>
										</div>
								</div>
								<div class="modal-footer">
									'.$this->updates.'
								</div>
								
								'.$this->gclose.'
							</div>
							
							<div class="span6">
								<div id="module">
									<div class="module-head">
										<h3><i class="fa fa-shopping-cart"></i> Orders </h3>
									</div>
									<div class="module-body">
										
										<table class="table table-striped table-advance table-hover table-bordered">
											<thead>
												<tr>
													<th class="span1">#</th>
													<th class="span7">Products</th>
													<th class="span2">Quantity</th>
													<th class="span2">Total</th>
													
												</tr>	
											</thead>
											<tbody>';
										$i=0; foreach ($this->carts as $cart)
										{
											$i++;
											echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$cart->title.'</td>
													<td>'.$cart->quantity.' Items </td>
													<td>IDR '.number_format($cart->prices, 0, ',', '.').'</td>
												</tr>';
										}
										echo '
												<tr>
													<td class="span1"></td>
													<td class="span7"><b>Total</b></td>
													<td class="span2"></td>
													
													<td class="span2"><b>IDR '.number_format($this->totals, 0, ',', '.').'</b></td>
													
												</tr>	
											</tbody>
										</table>	
							
									</div>
								</div>	
							</div>
							
							<div class="span6">
								<div id="module">
									<div class="module-head">
										<h3><i class="fa fa-truck"></i> Courier </h3>
									</div>
									<div class="module-body">
										<img src="'.$this->base.'media/shop/courier/'.$this->item->courier.'.jpg"/>
									</div>
								</div>	
							</div>
						
						
					</div>
				</div>
			</div>
			
			<div class="row-fluid show-grid">
				<div class="span12">
					<div id="module">
						<div class="module-head">
							'.form_open('shop/drops', $this->gform).'
								<span class="pull-right">'.$this->submit.'</span>								
							'.$this->gclose.'
						
							<h3><i class="fa fa-exclamation-triangle"></i> Terms of Use </h3>
						</div>
						<div class="module-body">
							Saya menyatakan bahwa data tentang saya diatas adalah benar dan siap mempertanggungjawabkan kelayakan data tersebut. <br/><br/><br/>
							
							
							
							
							
						</div>
					</div>	
				</div>				
			</div>
			
			
			
			
			
		</div>
	</div>
</div>
';?>

<script>
$(function() { $(".stat-1").click(function() { $(".stat-2").val($(this).val()); }); });
</script>