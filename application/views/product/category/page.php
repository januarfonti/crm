<?php
	echo '
		<a href="'.$this->base.'form/1/add">add category</a> 
	';
	echo '.<br/>.';
	echo '.<br/>.';
	
	foreach ($this->result as $product)
	{
		echo $product->name;
		echo '.<br/>.';
	}
?>
