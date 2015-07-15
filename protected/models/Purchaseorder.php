<?php

/**
 * This is the model class for table "purchaseorder".
 *
 * The followings are the available columns in table 'purchaseorder':
 * @property integer $id
 * @property integer $accountid
 * @property string $tax
 * @property string $taxrate
 * @property string $subtotal
 * @property string $total
 * @property integer $providerid
 * @property string $billto_name
 * @property string $billto_company
 * @property string $billto_address
 * @property string $billto_phone
 * @property string $billto_city
 * @property string $billto_state
 * @property string $billto_country
 * @property string $billto_zipcode
 * @property string $shipto_name
 * @property string $shipto_company
 * @property string $shipto_address
 * @property string $shipto_phone
 * @property string $shipto_city
 * @property string $shipto_state
 * @property string $shipto_country
 * @property string $shipto_zipcode
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property TraderAccount $account
 * @property Provider $provider
 */
class Purchaseorder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchaseorder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accountid, providerid, billto_name, billto_address, billto_phone, billto_city, billto_state, billto_country, shipto_name, shipto_company, shipto_address, shipto_phone, shipto_city, shipto_state, shipto_country', 'required'),
			array('accountid, providerid', 'numerical', 'integerOnly'=>true),
			array('tax, billto_zipcode, shipto_zipcode', 'length', 'max'=>10),
			array('billto_name, billto_company, shipto_name, shipto_company', 'length', 'max'=>100),
			array('billto_phone, billto_city, billto_state, billto_country, shipto_phone, shipto_city, shipto_state, shipto_country', 'length', 'max'=>45),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, accountid, providerid, billto_zipcode, shipto_name, shipto_zipcode, created_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'account' => array(self::BELONGS_TO, 'TraderAccount', 'accountid'),
			'provider' => array(self::BELONGS_TO, 'Provider', 'providerid'),
			'purchaseorder_items' => array(self::HAS_MANY, 'PurchaseorderItems', 'purchaseorderid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'accountid' => 'Accountid',
			'tax' => 'Tax',
			'providerid' => 'Providerid',
			'total' => 'Total',
			'billto_name' => 'Billto Name',
			'billto_company' => 'Billto Company',
			'billto_address' => 'Billto Address',
			'billto_phone' => 'Billto Phone',
			'billto_city' => 'Billto City',
			'billto_state' => 'Billto State',
			'billto_country' => 'Billto Country',
			'billto_zipcode' => 'Billto Zipcode',
			'shipto_name' => 'Shipto Name',
			'shipto_company' => 'Shipto Company',
			'shipto_address' => 'Shipto Address',
			'shipto_phone' => 'Shipto Phone',
			'shipto_city' => 'Shipto City',
			'shipto_state' => 'Shipto State',
			'shipto_country' => 'Shipto Country',
			'shipto_zipcode' => 'Shipto Zipcode',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('accountid',$this->accountid);
		$criteria->compare('tax',$this->tax,true);
		$criteria->compare('providerid',$this->providerid);
		$criteria->compare('billto_name',$this->billto_name,true);
		$criteria->compare('billto_company',$this->billto_company,true);
		$criteria->compare('billto_address',$this->billto_address,true);
		$criteria->compare('billto_phone',$this->billto_phone,true);
		$criteria->compare('billto_city',$this->billto_city,true);
		$criteria->compare('billto_state',$this->billto_state,true);
		$criteria->compare('billto_country',$this->billto_country,true);
		$criteria->compare('billto_zipcode',$this->billto_zipcode,true);
		$criteria->compare('shipto_name',$this->shipto_name,true);
		$criteria->compare('shipto_company',$this->shipto_company,true);
		$criteria->compare('shipto_address',$this->shipto_address,true);
		$criteria->compare('shipto_phone',$this->shipto_phone,true);
		$criteria->compare('shipto_city',$this->shipto_city,true);
		$criteria->compare('shipto_state',$this->shipto_state,true);
		$criteria->compare('shipto_country',$this->shipto_country,true);
		$criteria->compare('shipto_zipcode',$this->shipto_zipcode,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Purchaseorder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
