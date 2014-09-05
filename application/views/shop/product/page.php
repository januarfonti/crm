<?php 
echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			<div class="row-fluid show-grid">
				<div class="span7">';
					//Shop Listing
					foreach ($this->items as $product)
					{ $content	= str_replace("\\r\\n", "<br/>", $product->description); 
						echo '
						<div id="blog-view">
							<div class="blog-head">
								<h3>'.$product->title.'</h3>
								</div>	
							<div class="blog-body">
								<img src="'.$this->base.'media/shop/'.$product->image.'" />
								<p>'.$content.'</p>
								<p>Price : '.$product->price.'</p>
								<div class="clearfix"></div>
							</div>
							<div class="blog-footer">
								<div class="pull-right">';
								
								if ($this->userid <> 0)
								{//Product Query
								$po_database	= $this->db->dbprefix('shop_cart');		
								$po_query		= $this->db->query('SELECT * FROM '. $po_database .' WHERE product = '.$product->id.' AND userid = '. $this->userid);
								$po_count		= $po_query->num_rows();
								}
								
								if ($this->userid == 0)
									echo '
										<a class="btn btn-success" data-toggle="modal" role="button" href="#login">
											<span class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Add to Cart
										</a>
									'; 
								else
									switch ($po_count)
									{
										case 0 : echo '<a class="btn btn-success" data-toggle="modal" role="button" href="#cart-'.$product->id.'"> <i class="fa fa-shopping-cart"></i> Add to Cart </a>'; break;
										case 1 : echo '<a class="btn" href="#"> <i class="fa fa-shopping-cart"></i> Added to carts </a>'; break;
									}
									
									echo '
																			
										<div id="cart-'.$product->id.'" class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" style="display: none;">
											<div class="modal-header">
												<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
													<h3> Add to Cart </h3>
											</div>
											
											'.form_open('shop/cart/'.$product->id, $this->gform).'
											<div class="modal-body">
													<div class="control-group">
														<label class="control-label">Quantity</label>
														<div class="controls">
															<input class="input-xlarge" id="quantity" type="text" name="quantity" >
															<input id="product" type="hidden" name="product" value="'.$product->id.'">
															<input id="price" type="hidden" name="price" value="'.$product->price.'">
														</div>
													</div>
											</div>
											<div class="modal-footer">
												'.$this->shopcart.'
											</div>	
											'.$this->gclose.'
										</div>
									';
								
								
echo '								
									<a class="btn btn-primary" href="'.$this->base.'shop/product/'.$product->id.'/'.$product->alias.'/"> <i class="fa fa-sign-out"></i> Read More </a>				
								</div>	
							</div>
							<div class="clearfix"></div>
						</div>
					  ';		
					}
echo '			</div>
				<div class="span5">
					<div id="module">
						<div class="module-head">
							<h3>My Carts</h3>
						</div>
						<div class="module-body">';
						if ($this->userid == 0) { echo 'Please login to see cart'; }
						else 
						{
							echo '
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="span1">Q</th>
										<th class="span7">Products</th>
										<th class="span2">Total</th>
										<th class="span4">Total</th>
									</tr>	
								</thead>
								<tbody>';
							foreach ($this->carts as $cart)
							{
								echo '
									<tr>
										<td>'.$cart->quantity.'</td>
										<td>'.$cart->title.'</td>
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
										<th class="span1"></th>
										<th class="span6">Total</th>
										<th class="span5">IDR '.number_format($this->totals, 0, ',', '.').'</th>
										<th></th>
									</tr>	
								</tbody>
							</table>';
						}	
							
							
echo '					</div>
					</div>
					<div id="module">
						<div class="module-head">
							<h3>Category Options</h3>
							Filter articles by category
						</div>
						<div class="module-body">
							<a href="'.$this->base.'blog/sort/alphabetical/">Alphabetical</a>
							<a href="'.$this->base.'blog/sort/newest/">Newest</a>
							<a href="'.$this->base.'blog/sort/oldest/">Oldest</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
';?>