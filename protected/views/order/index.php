<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Purchase Orders',
);


?>

<h1>Purchase Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	                'dataProvider'=>$dataProvider,
	                'itemView'=>'_view'
)); ?>
