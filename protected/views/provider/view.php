<?php
/* @var $this ProviderController */
/* @var $model Provider */

$this->breadcrumbs=array(
	'Providers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Provider', 'url'=>array('index')),
	array('label'=>'Create Provider', 'url'=>array('create')),
	array('label'=>'Update Provider', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Provider', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Provider', 'url'=>array('admin')),
);
?>

<h1>View Provider #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'ruc',
		'dv',
		'phone',
		'email',
		'address',
		'contactname',
		'managing_director',
	),
)); ?>
