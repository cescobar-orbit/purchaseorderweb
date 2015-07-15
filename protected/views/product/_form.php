<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'productcode'); ?>
		<?php echo $form->textField($model,'productcode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'productcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productname'); ?>
		<?php echo $form->textField($model,'productname',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'productname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'displayable'); ?>
		<?php echo $form->textField($model,'displayable'); ?>
		<?php echo $form->error($model,'displayable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'providerid'); ?>
		<?php 
		    $models = Provider::model()->findAll(array('order' => 'name'));
 
            $list = CHtml::listData($models, 'id', 'name'); 
            echo $form->dropDownList($model, 'providerid', $list,
                                     array('empty' => '(Select a provider')
                                     );
		    //echo $form->textField($model,'providerid');
		  ?>
		<?php echo $form->error($model,'providerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taxable'); ?>
		<?php echo $form->textField($model,'taxable'); ?>
		<?php echo $form->error($model,'taxable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->