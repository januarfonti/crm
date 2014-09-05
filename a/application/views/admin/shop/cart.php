<?php 

$u_query 	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('users') . ' WHERE id = ' .$this->item->uid);
$customer	= $u_query->row();

$phone_1 	= substr($customer->phone, 1, 2);
$phone_2	= substr($customer->phone, 3, 12);
$phone_3	= number_format($phone_2, 0, ' ', ' ');

echo '
<div class="row-fluid invoice-list">
	<div class="span4">
		<h4>BILLING ADDRESS</h4>
		<br/>
		<p>
			'.$customer->name.' <br>
			'.$customer->address.' <br>
			'.$customer->email.' <br>
			+62 '.$phone_1.' '.$phone_3.'
		</p>
	</div>
	
	<div class="span4">
		<h4>COURIER</h4>
			<img src="'.$this->base.'media/shop/courier/'.$this->item->courier.'.jpg"/>	
	</div>

	<div class="span4">
	<h4>INVOICE INFO</h4> <br/>
		<ul class="unstyled">
			<li>Invoice Number : <strong>'.$this->item->id.'</strong></li>
			<li>Order Date : '.$this->item->created.'</li>
			<li>Invoice Status : ';
				switch ($this->item->status)
				{
					case 1 : echo '<span class="label label-important">Unpaid</span>'; break;
					case 2 : echo '<span class="label label-success">Paid</span>'; break;
				}
echo '		</li>
		</ul>
	</div>
</div>

<div class="space20"></div>
<div class="space20"></div>

<div class="row-fluid">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Item</th>
				<th class="hidden-480">Description</th>
				<th class="hidden-480">Unit Cost</th>
				<th class="hidden-480">Quantity</th>
				<th>Total</th>
			</tr>
		</thead>
	<tbody>';
	
	//explode data divided by space
	$rawdata	= rtrim($this->item->carts);
	$restdata	= substr($rawdata, 0, -1);
	$explode	= explode(",", $restdata);
		
	$i=0; $n=-1; foreach ($explode as $product)
	{
		$i++; $n++;
		
		//explode data divided by #
		$pieces		= explode("#", $explode[$n]);
		$product_id	= $pieces[0];
		$quantity	= $pieces[1];
		
		$p_query 	= $this->db->query('SELECT * FROM '. $this->db->dbprefix('shop_product') . ' WHERE id = ' .$product_id);
		$product	= $p_query->row();
		
		$item_total	= $product->price * $quantity;
		
		
		echo '
				<tr>
					<td>'.$i.'</td>
					<td>'.$product->title.'</td>
					<td class="hidden-480">'.substr($product->description, 0, 15).'...</td>
					<td class="hidden-480">'.number_format($product->price, 0, ',', '.').'</td>
					<td class="hidden-480">'.$quantity.'</td>
					<td><span class="pull-right">'.number_format($item_total, 0, ',', '.').'</span></td>
				</tr>
		';
	}

	
	
echo '

	</tbody>
	</table>
</div>

<div class="space20"></div>

<div class="row-fluid">
	<div class="span4 invoice-block pull-right">
		<ul class="unstyled amounts">
			<li>
				<strong>Grand Total :</strong> IDR '.number_format($this->item->total, 0, ',', '.').'
			</li>
		</ul>
	</div>
</div>

<div class="space20"></div>

<div class="row-fluid text-center">';

switch ($this->item->status)
				{
					case 1 : echo '
					'.form_open('admin/shop/cart/'.$this->item->id.'/approve/', $this->gform).'
						<button type="submit" class="btn btn-success btn-large hidden-print">  Approve Payment <i class="fa fa-check"></i> </button>
					'.$this->gclose.'
					'; break;
					
					case 2 : echo '
					'.form_open('admin/shop/cart/'.$this->item->id.'/pending/', $this->gform).'
						<button type="submit" class="btn btn-warning btn-large hidden-print">  Pending Payment Payment <i class="fa fa-check"></i> </button>
					'.$this->gclose.'
					'; break;
				}

echo '';




	
echo '	
</div>
</div>
';?>