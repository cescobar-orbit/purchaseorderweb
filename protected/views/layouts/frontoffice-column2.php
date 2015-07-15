<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/frontoffice'); ?>
<div class="col-md-9">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="col-md-3">
	<div id="sidebar" class="well">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			               'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			          'items'=>$this->menu,
			          'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>