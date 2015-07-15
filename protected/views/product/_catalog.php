<?php
/* @var $this ProductController */
/* @var $data Product */

?>

<div class="row">
 <?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'product-form-'.$data->id,
	'enableAjaxValidation'=>false,
	'action' => Yii::app()->createUrl('shoppingcart/add', array('id' => $data->id, 'providerid' => $data->providerid)),
  )); 
  ?>
   <div class="col-md-3 thumbnail">
   	  <?php 

   	        $photo = (isset($data->image)) ? $data->image : 'default.jpg';
   	        echo CHtml::image(Yii::app()->request->baseUrl.'/images/originals/'. $photo);
   	   ?>
   </div>
   <div class="col-sm-6">
		<?php echo CHtml::encode($data->productcode); ?>
		<br />
		<p class="text-uppercase"><b><?php echo CHtml::encode($data->productname); ?></b></p>
		<p><?php echo CHtml::encode($data->category); ?></p>
		<p><b>Features:</b> <br> <?php echo CHtml::encode($data->description); ?></p>
        
		 <span class="label label-danger"><span class="glyphicon glyphicon-usd"></span>&nbsp;<?php echo CHtml::encode($data->price); ?></span>

		<br />
   </div>
	<div class="row buttons">
	     <button type="submit" class="btn-sm btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to Cart</button>
	      <select id="quantity" name="quantity">
	      	 <option value="1" selected>1</option>	      	 
	      	 <option value="2">2</option>
	      	 <option value="3">3</option>
	      	 <option value="4">4</option>
	      	 <option value="5">5</option>
	      	 <option value="6">6</option>
	      	 <option value="7">7</option>
	      	 <option value="8">8</option>
	      	 <option value="9">9</option>
             <option value="10">10</option>
	      </select>
	</div>

<?php $this->endWidget(); ?>
</div>
<br><br>