<?php 
  $items = $model->purchaseorder_items;
  $vendor = Provider::model()->findByPk($model->providerid);
?>


<div class="alert alert-success">
   <h3>PURCHASE ORDER - <?php echo $model->billto_company ?></h3>
</div>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="40%">
       <p>
         <?php echo $model->billto_address ?><br>
         <?php echo $model->billto_city .", ". $model->billto_state .", ". $model->billto_zipcode ?><br>
        Phone: <?php echo $model->billto_phone ?><br>
      </p>
    </td>
    <td width="40%">
        <p>P.O. #: <?php echo $model->id ?><br>
           Date: <?php echo $model->created_at ?><br>
        </p>
    </td>
  </tr>
</table>
<br>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
    <td width="40%">
		   <p><b>VENDOR</b><br>
		   <?php echo $vendor->name ?><br>
		    RUC: <?php echo $vendor->ruc ?><br>
        DV: <?php echo $vendor->dv ?><br>
        Phone: <?php echo $vendor->phone ?><br>
        Addr: <?php echo $vendor->address?><br>
      </p>
	</td>
	<td width="40%">
	  <p><b>SHIP TO</b><br>
		 Attn: <?php echo $model->shipto_name ?><br>
		 <?php echo $model->shipto_company ?><br>
     Phone: <?php echo $model->shipto_phone ?><br>
     <?php echo $model->shipto_city .", ". $model->shipto_state .", ". $model->shipto_country ." Zip: ". $model->shipto_zipcode ?><br>
     Addr: <?php echo $model->shipto_address ?><br>
     </p>
	  </td>
   </tr>
 </table>

<!-- Note: For some reason the mailer does not resolve the CSS style and DIV tags -->
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <thead>
    <tr>
       <th>CODE</th>
    	 <th>DESCRIPTION</th>
    	 <th width="5%">QTY</th>
    	 <th width="10%">UNIT PRICE</th>
    	 <th width="10%">TOTAL</th>
     </tr>
  </thead>
  <tbody>
     <?php foreach($items as $item){
     	$product = Product::model()->findByPk($item->productid);
     	?>
  	 <tr>
  	   <td><?php echo $product->productcode ?></td>
  	   <td><?php echo $product->productname ?></td>
  	   <td align="right"><?php echo $item->quantity ?></td>
  	   <td align="right">$<?php echo $item->price ?></td>
  	   <td align="right">$<?php echo ($item->price * $item->quantity) ?></td>
  	 </tr>
  	  <?php } ?>
    <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
  	 <tr>
  	   <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
  	   <td align="right">TAX RATE</td>
  	   <td align="right"><?php echo $model->taxrate ?></td>
  	 </tr>
  	 <tr>
  	   <td colspan="3">&nbsp;</td>
  	   <td align="right">TAX</td>
  	   <td align="right">$ <?php echo $model->tax ?></td>
  	 </tr>
  	 <tr>
  	   <td colspan="3">&nbsp;</td>
  	   <td align="right">SUB TOTAL</td>
  	   <td align="right">$<?php echo $model->subtotal ?></td>
  	 </tr>
  	 <tr>
  	   <td colspan="3">&nbsp;</td>
  	   <td align="right"><b>TOTAL</b></td>
  	   <td align="right"><b>$<?php echo $model->total ?></b></td>
  	 </tr>
  </tbody>
</table>