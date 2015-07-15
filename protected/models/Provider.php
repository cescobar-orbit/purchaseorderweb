<?php

/**
 * This is the model class for table "provider".
 *
 * The followings are the available columns in table 'provider':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $ruc
 * @property integer $dv
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $contactname
 * @property string $managing_director
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property Purchaseorder[] $purchaseorders
 */
class Provider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'provider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, name, ruc, dv, phone, email, address, contactname, managing_director', 'required'),
			array('dv', 'numerical', 'integerOnly'=>true),
			array('code, name, phone', 'length', 'max'=>45),
			array('ruc, managing_director', 'length', 'max'=>60),
			array('email', 'length', 'max'=>255),
			array('contactname', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, ruc, dv, phone, email, address, contactname, managing_director', 'safe', 'on'=>'search'),
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
			'products' => array(self::HAS_MANY, 'Product', 'providerid'),
			'purchaseorders' => array(self::HAS_MANY, 'Purchaseorder', 'providerid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'name' => 'Name',
			'ruc' => 'Ruc',
			'dv' => 'Dv',
			'phone' => 'Phone',
			'email' => 'Email',
			'address' => 'Address',
			'contactname' => 'Contactname',
			'managing_director' => 'Managing Director',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('dv',$this->dv);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contactname',$this->contactname,true);
		$criteria->compare('managing_director',$this->managing_director,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Provider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
