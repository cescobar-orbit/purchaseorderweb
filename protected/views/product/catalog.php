<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	 $provider->name => array('provider/index'),
	'Products'=> '',
	 '',
);

?>
<br>

<div role="alert" class="alert alert-info">
      <strong>Catalog</strong> - <?php echo $provider->name ?>
 </div>
 <div class="clear"></div>
 
<?php 

    //Custom component which calls the html template to show the data
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_catalog'
	));


?>


