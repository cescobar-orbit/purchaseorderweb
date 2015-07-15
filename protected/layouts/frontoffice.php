<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">



	<!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

 
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Web Store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo Yii::app()->createUrl("provider/index") ?>">Providers <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo Yii::app()->createUrl("purchaseorder/index") ?>">Purchase Orders</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if(isset(Yii::app()->session['cart']) && count(Yii::app()->session['cart']) > 0){ ?>
        <li>
           <a href="<?php echo Yii::app()->createUrl("shoppingcart/detail") ?>">
             <span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"><?php echo count(Yii::app()->session['cart']) ?></span>
           </a>
         </li>
         <?php } ?>
         <li>
           <?php if(Yii::app()->user->isGuest){ ?>
            <a href="<?php echo Yii::app()->createUrl("site/login") ?>">Log in</a>
           <?php }  else if(!Yii::app()->user->isGuest){ ?>
           <a href="<?php echo Yii::app()->createUrl("site/logout") ?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;<? echo Yii::app()->user->name ?></a>
           <?php } ?>
         </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

    <div class="clear"></div>
    <!--
	<footer class="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Carlos Escobar.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</footer>
   -->
	<!-- footer -->
</div><!-- page -->

</body>
</html>
