<?php
/* @var $this OrderController */
/* @var $data Purchaseorder */
 $provider = Provider::model()->findByPk($data->providerid);
?>

<div class="view well">

	<b>P.O.#</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b>Provider:</b>
	<?php echo CHtml::encode($provider->name); ?>
	<br />

	<b>Address:</b>
	<?php echo CHtml::encode($provider->address); ?>
	<br />

	<b>RUC:</b>
	<?php echo CHtml::encode($provider->ruc); ?>
	<br />

	<b>D.V:</b>
	<?php echo CHtml::encode($provider->dv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	$<?php echo CHtml::encode( $data->total ); ?>
	<br />


</div>