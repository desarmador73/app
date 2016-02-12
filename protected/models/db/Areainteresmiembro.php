<?php

/**
 * This is the model class for table "areainteresmiembro".
 *
 * The followings are the available columns in table 'areainteresmiembro':
 * @property integer $idareainteresmiembro
 * @property integer $idareainteres
 * @property integer $idmiembro
 * @property string $descotra
 *
 * The followings are the available model relations:
 * @property Areainteres $idareainteres0
 * @property Miembro $idmiembro0
 */
class Areainteresmiembro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'areainteresmiembro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idareainteres, idmiembro', 'required'),
			array('idareainteres, idmiembro', 'numerical', 'integerOnly'=>true),
			array('descotra', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idareainteresmiembro, idareainteres, idmiembro, descotra', 'safe', 'on'=>'search'),
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
			'idareainteres0' => array(self::BELONGS_TO, 'Areainteres', 'idareainteres'),
			'idmiembro0' => array(self::BELONGS_TO, 'Miembro', 'idmiembro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idareainteresmiembro' => 'Idareainteresmiembro',
			'idareainteres' => 'Idareainteres',
			'idmiembro' => 'Idmiembro',
			'descotra' => 'Descotra',
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

		$criteria->compare('idareainteresmiembro',$this->idareainteresmiembro);
		$criteria->compare('idareainteres',$this->idareainteres);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('descotra',$this->descotra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Areainteresmiembro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
