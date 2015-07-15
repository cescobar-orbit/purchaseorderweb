<?php
/* @var $this ShoppingcartController */

$this->breadcrumbs=array(
	'Shopping cart',
);

$session = Yii::app()->session;
$product_items = (isset($session['cart']) && count($session['cart']) > 0) ? $session['cart'] : array();
$total = 0.00;
$providerid = 0;

?>
<div class="container">
<h2>Shopping cart</h2>


<div role="alert" class="alert alert-info">
      <strong>Attention !</strong> - Please verify the items you have selected before buying them.
 </div>
 <div class="clear"></div>


<div class="row">
	<table id="cartView" class="table table-striped table-bordered table-condensed">
		<thead>
		    <th>Qty</th>
			<th>Product code</th>
			<th>Product name</th>
			<th>Unit Price</th>
			<th>Cost</th>
		</thead>
		<tbody>
		  <?php foreach($product_items as $item) { ?>
			<tr>
			    <td><?php echo $item['qty'] ?></td>
				<td><?php echo $item['productcode'] ?></td>
				<td><?php echo $item['productname'] ?></td>
				<td><?php echo $item['price'] ?></td>	
				<td><?php echo ($item['price'] * $item['qty']) ?></td>				
			</tr>
			<?php 
			    $total += ($item['price'] * $item['qty']); 
			    $providerid = $item['provider'];
			  } 
			?>
			<tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><b>Total ($): </b></td>
				<td><b><?php echo $total ?></b></td>
			</tr>
			<tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	   
  </div>
				

        <div class="clear"></div>
	    <div class="row-fluid">
				<?php echo CHtml::button('Empty cart', array('submit' => array('shoppingcart/empty', 'providerid'=>$providerid) )); ?>
				<?php echo CHtml::button('Continue shopping', array('submit' => array('product/list','id'=>$providerid) )); ?>
                <?php echo CHtml::button('Check out', array('submit' => array('shoppingcart/checkout', 'providerid'=>$providerid) )); ?>
	     </div>
</div>
