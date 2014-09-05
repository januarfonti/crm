<?php 
echo '
<div id="blog">
	<div class="container-fluid">
		<div class="span10 offset1">
			<div class="row-fluid show-grid">
				<div class="span12">
				
					<div id="module">
						<div class="progress">
							<div class="bar" style="width: 50%;"></div>
						</div>
						<span class="pull-right"><h1>50%</h1></span>
						<h2>Step 2 - Select Courier</h2>
					</div>
					
					
					<div id="module">
						<div class="module-head">
							<h3><i class="fa fa-truck"></i> Available Courier</h3>
						</div>
						<div class="module-body">';
					
							
							
echo '					
						<div class="">
							'.form_open('shop/courier/', $this->gform).'
							
									<div class="stat fcourier" data-toggle="buttons-radio">
										<input class="stat-1" value="1" type="image" src="'.$this->base.'media/shop/courier/1.jpg">
										<input class="stat-1" value="2" type="image" src="'.$this->base.'media/shop/courier/2.jpg">
										<input class="stat-1" value="3" type="image" src="'.$this->base.'media/shop/courier/3.jpg">
										<input class="stat-1" value="4" type="image" src="'.$this->base.'media/shop/courier/4.jpg">
										<input class="stat-1" value="5" type="image" src="'.$this->base.'media/shop/courier/5.jpg">
										<input class="stat-1" value="6" type="image" src="'.$this->base.'media/shop/courier/6.jpg">
										<input class="stat-1" value="7" type="image" src="'.$this->base.'media/shop/courier/7.jpg">
									</div>
										<input id="courier" class="stat-2" type="hidden" value="" name="courier">
							

								<input id="carts" type="hidden" name="carts" 
								value="';
									foreach ($this->carts as $cart) { echo $cart->pid . '#' . $cart->quantity .','; }
echo'							">
								<input id="total" type="hidden" name="total" value="'.$this->totals.'">	<br/>
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

<script>
$(function() { $(".stat-1").click(function() { $(".stat-2").val($(this).val()); }); });
</script>