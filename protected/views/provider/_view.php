<?php
/* @var $this ProviderController */
/* @var $data Provider */
?>

<div class="alert alert-info">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dv')); ?>:</b>
	<?php echo CHtml::encode($data->dv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
    <br/>
	   <?php echo CHtml::button('Manage Products', array('submit' => array('product/index','id' => $data->id))); ?>
       <?php echo CHtml::button('Catalog', array('submit' => array('product/list','id' => $data->id))); ?>
      
	<br />

</div>