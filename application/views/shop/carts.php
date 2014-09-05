<?php 
echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			<div class="row-fluid show-grid">
				<div class="span12">
				
					<div id="module">
						<div class="progress">
							<div class="bar" style="width: 25%;"></div>
						</div>
						<span class="pull-right"><h1>25%</h1></span>
						<h2>Step 1 - Review Orders</h2>
					</div>
					
					
					<div id="module">
						<div class="module-head">
							<h3>My Carts</h3>
						</div>
						<div class="module-body">';
						if ($this->userid == 0) { echo 'Please login to see cart'; }
						else 
						{
							echo '
							<table class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<tr>
										<th class="span1">#</th>
										<th class="span5">Products</th>
										<th class="span2">Quantity</th>
										<th class="span2">Total</th>
										<th class="span2">Options</th>
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
										<td>
											
											<a class="btn btn-mini btn-primary" data-toggle="modal" role="button" href="#carts-'.$cart->cid.'"> <i class="fa fa-edit"></i> </a>									
											<div id="carts-'.$cart->cid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
												<div class="modal-header">
													<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
														<h3> Edit Quantity </h3>
												</div>
												'.form_open('shop/edit/'.$cart->cid, $this->gform).'
												<div class="modal-body">
														<div class="control-group">
															<label class="control-label">Quantity</label>
															<div class="controls">
																<input class="input-xlarge" id="quantity" type="text" name="quantity" value="'.$cart->quantity.'">
																<input id="product" type="hidden" name="product" value="'.$cart->product.'">
																<input id="price" type="hidden" name="price" value="'.$cart->price.'">
															</div>
														</div>
												</div>
												<div class="modal-footer">
													'.$this->submit.'
												</div>	
												'.$this->gclose.'
											</div>
											
											<a class="btn btn-mini btn-danger" data-toggle="modal" role="button" href="#drop-'.$cart->cid.'"> <i class="fa fa-times"></i> </a>									
											<div id="drop-'.$cart->cid.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
												<div class="modal-header">
													<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
														<h3> Canceling Order </h3>
												</div>
												'.form_open('shop/drop/'.$cart->cid, $this->gform).'
												<div class="modal-body">
													Are you sure want to cancel order to <b>'.$cart->title.'</b>? 
												</div>
												<div class="modal-footer">
													'.$this->shopcancel.'
												</div>	
												'.$this->gclose.'
											</div>
										</td>
									</tr>';
							}
							echo '
									<tr>
										<td class="span1"></td>
										<td class="span5">Total</td>
										<td class="span2"></td>
										
										<td class="span2">IDR '.number_format($this->totals, 0, ',', '.').'</td>
										<td class="span2"></td>
									</tr>	
								</tbody>
							</table>';
						}	
							
							
echo '					
						<div class="pull-right">
							'.form_open('shop/confirm/', $this->gform).'
								<input id="uid" type="hidden" name="uid" value="'.$this->userid.'">
								<input id="carts" type="hidden" name="carts" 
								value="';
									foreach ($this->carts as $cart) { echo $cart->pid . '#' . $cart->quantity .','; }
echo'							">
								<input id="total" type="hidden" name="total" value="'.$this->totals.'">	<br/>
								<button class="btn btn-primary btn-large" type="submit"> <i class="fa fa-shopping-cart"></i> <span class="smooth"> Place Order</span> </button>
							'.$this->gclose.'
						</div>
						<div class="clearfix"></div><br/>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
';?>