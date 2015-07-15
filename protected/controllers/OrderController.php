<?php

class OrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'generate', 'mail'),
				'users'=>array('*'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->layout = 'frontoffice';

		$dataProvider = new CActiveDataProvider('Purchaseorder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout = 'frontoffice';

		$this->render('view',array('model'=>$this->loadModel($id) ));
	}


	public function actionGenerate($providerid)
	{
		$this->layout = 'frontoffice';

		$session = Yii::app()->session;
        $purchase_order = new Purchaseorder; 

        if(isset($_POST['Purchaseorder']))
		{
			$purchase_order->attributes = $_POST['Purchaseorder'];

			$purchase_order->providerid = $providerid;

			//TO-DO: implement a way to extract configuration values like this in another place.
			$purchase_order->taxrate = 0.07;

			//TO-DO: Get the account from the session for the logged account.
			$purchase_order->accountid = 1; 
			$purchase_order->created_at = date("Y-m-d H:i:s");
            $purchase_order_items = $session['cart'];
           
            if($purchase_order->save())
            {
              $this->savePurchaseOrderItems($purchase_order, $purchase_order_items);
              
              $mailer = $this->mail($purchase_order);
              if($mailer->Send()){
              	unset($session['cart']);
                $this->render('report',array('model'=>$purchase_order ));
              }
              else{
              	 $this->renderPartial('_error', array('error_message' => $mailer->ErrorInfo) );
              }
		      
            }
           
		}

	}  


    /**
     * Saves the purchaseorder items '$poItems' from the session,
     * assoacited to the purchase order '$po' header.
     * @param $po
     * @param $poItems
     **/
	protected function savePurchaseOrderItems($po, $poItems)
	{
        $sub_total = 0.00;

		foreach($poItems as $item)
		{
			$modelItem = new PurchaseorderItems;
			$modelItem->productid = $item['id'];
			$modelItem->quantity  = $item['qty'];
			$modelItem->price = $item['price'];
			$modelItem->purchaseorderid = $po->id;
            $sub_total += ($modelItem->quantity * $modelItem->price);
            $modelItem->save();
		}

        $po->subtotal = $sub_total;
        $po->tax = round(($sub_total * $po->taxrate), 2);
        $po->total = ($po->tax + $sub_total);
		$po->save();
	}



    /**
     * Returns the mailer object to email the PO
     * @param purchase order '$model'
     * @return mailer object.
     */
    protected function mail($model)
    {

      Yii::app()->mailer->Host = Yii::app()->params['smtpHost'];
      Yii::app()->mailer->Username = Yii::app()->params['smtpUsername'];
      Yii::app()->mailer->Password = Yii::app()->params['smtpPassword'];
      Yii::app()->mailer->Port = Yii::app()->params['smtpPort'];
      Yii::app()->mailer->IsSMTP();
      Yii::app()->mailer->SMTPAuth = true;
      Yii::app()->mailer->IsHTML();
      Yii::app()->mailer->CharSet = 'UTF-8';
                                
      Yii::app()->mailer->From = Yii::app()->params['adminEmail'];
      Yii::app()->mailer->FromName = Yii::app()->name;
      Yii::app()->mailer->Sender = Yii::app()->params['adminEmail'];
      
      Yii::app()->mailer->AddAddress( Provider::model()->findByPk($model->providerid)->email );
      Yii::app()->mailer->AddAddress( Yii::app()->params['adminEmail'] );
       
      Yii::app()->mailer->Subject = 'Purchase Order';
      Yii::app()->mailer->Body =  $this->renderPartial('_report', array('model' => $model), true);
      
      return Yii::app()->mailer;
    }



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Purchaseorder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Purchaseorder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}




	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchaseorder-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
