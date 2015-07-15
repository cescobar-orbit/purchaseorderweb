<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productcode')); ?>:</b>
	<?php echo CHtml::encode($data->productcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productname')); ?>:</b>
	<?php echo CHtml::encode($data->productname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	$<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayable')); ?>:</b>
	<?php echo CHtml::encode($data->displayable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('providerid')); ?>:</b>
	<?php echo CHtml::encode( Provider::model()->findByPk($data->providerid)->name ); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taxable')); ?>:</b>
	<?php echo CHtml::encode($data->taxable); ?>
	<br />

	*/ ?>

</div>