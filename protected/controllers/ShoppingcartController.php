<?php

class ShoppingcartController extends Controller
{
	/**
	 * Adds item to the shopping cart.
	 * @param product '$id' and provider '$providerid' and quantity of products selected
	 */
	public function actionAdd($id, $providerid)
	{

		$product = Product::model()->findByPk($id);
		$quantity = CHttpRequest::getParam('quantity');
        
        /* ProductItem virtual model */
        $product_item = array('id' => $product->id, 
        	          'productname' => $product->productname, 
        	          'productcode' => $product->productcode,
        	          'price' => $product->price,
        	          'provider' => $providerid, 
        	          'qty' => $quantity);
       

        $session = Yii::app()->session;
        if (!isset($session['cart']) || count($session['cart']) == 0)
        {
            $session['cart'] = array($product_item);
        } else
        {
        	//TO-DO: implement a mechanism to check if the new item already exists and to prevent duplicate it in the session
            $items = $session['cart'];
            $items[] = $product_item;
            $session['cart'] = $items;
        }

		$this->redirect(array('product/list', 'id' => $providerid));
    }

    /**
     * Shows the shopping cart items
     */
    public function actionDetail()
    {
    	$this->layout = 'frontoffice';
    	$this->render('detail');
    }


	public function actionRemove()
	{
		//TO-DO: implement a mechanim to remove an individual item from the cart.
		$this->render('remove');
	}



    /**
     * Gets clean up the shopping cart
     **/
    public function actionEmpty($providerid)
	{
		$session = Yii::app()->session;
		unset($session['cart']);

		$this->redirect(array('product/list', 'id'=>$providerid));
	}



	public function actionCheckout($providerid)
	{
		$this->layout = 'frontoffice';

		$model = new Purchaseorder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$this->render('checkout',array('model'=>$model, 'providerid' => $providerid));
	}




	/**
	 * Performs the AJAX validation.
	 * @param Purchaseorder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='checkout-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}