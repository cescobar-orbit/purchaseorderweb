<?php
/* @var $this ShoppingcartController */

$this->breadcrumbs=array(
	'Products'=>array('/product/list', 'id'=>$providerid),
	'Check out',
);
?>

<br>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checkout-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true,),
	'action' => Yii::app()->createUrl('order/generate', array('providerid'=>$providerid)),
)); ?>
	  <div class="row">
		<?php echo CHtml::submitButton('Continue'); ?>

     </div>

	<?php echo $form->errorSummary($model); ?>
    <div class="col-md-5 well">
    <!-- Billing Address -->
     <div role="alert" class="alert alert-info">
        <strong>Billing Address</strong> - Please, fill all the fields required for processing your order. 
        Fields with <span class="required">*</span> are required.
     </div>
     
	<div class="row">
		<?php echo $form->labelEx($model,'billto_name'); ?>
		<?php echo $form->textField($model,'billto_name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'billto_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_company'); ?>
		<?php echo $form->textField($model,'billto_company',array('size'=>30, 'maxlength'=>50)); ?>
		<?php echo $form->error($model,'billto_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_phone'); ?>
		<?php echo $form->textField($model,'billto_phone',array('size'=>30,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'billto_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_address'); ?>
		<?php echo $form->textArea($model,'billto_address',array('rows'=>6, 'cols'=>30)); ?>
		<?php echo $form->error($model,'billto_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_city'); ?>
		<?php echo $form->textField($model,'billto_city',array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'billto_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_state'); ?>
		<?php echo $form->textField($model,'billto_state', array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'billto_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_country'); ?>
		<?php echo $form->textField($model,'billto_country' ,array('size'=>30,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'billto_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billto_zipcode'); ?>
		<?php echo $form->textField($model,'billto_zipcode',array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'billto_zipcode'); ?>
	</div>
   </div>

    <div class="col-md-5 well">
    <!-- Shipping Address -->
     <div role="alert" class="alert alert-info">
        <strong>Shipping Address</strong> - This information is need to complete your order!.
        Fields with <span class="required">*</span> are required.
     </div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_name'); ?>
		<?php echo $form->textField($model,'shipto_name',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'shipto_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_company'); ?>
		<?php echo $form->textField($model,'shipto_company',array('size'=>30, 'maxlength'=>100)); ?>
		<?php echo $form->error($model,'shipto_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_phone'); ?>
		<?php echo $form->textField($model,'shipto_phone',array('size'=>30,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'shipto_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_address'); ?>
		<?php echo $form->textArea($model,'shipto_address',array('rows'=>6, 'cols'=>30)); ?>
		<?php echo $form->error($model,'shipto_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_city'); ?>
		<?php echo $form->textField($model,'shipto_city',array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'shipto_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_state'); ?>
		<?php echo $form->textField($model,'shipto_state', array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'shipto_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_country'); ?>
		<?php echo $form->textField($model,'shipto_country' ,array('size'=>30,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'shipto_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipto_zipcode'); ?>
		<?php echo $form->textField($model,'shipto_zipcode',array('size'=>30,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'shipto_zipcode'); ?>
	</div>

  </div>

   <div class="clear"></div>


<?php $this->endWidget(); ?>

</div>
