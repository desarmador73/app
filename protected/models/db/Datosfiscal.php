<?php

/**
 * This is the model class for table "datosfiscal".
 *
 * The followings are the available columns in table 'datosfiscal':
 * @property integer $iddatosfiscal
 * @property integer $idmiembro
 * @property string $razonsocial
 * @property string $domfiscal
 *
 * The followings are the available model relations:
 * @property Miembro $idmiembro0
 */
class Datosfiscal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datosfiscal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmiembro', 'required'),
			array('idmiembro', 'numerical', 'integerOnly'=>true),
			array('razonsocial, domfiscal', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddatosfiscal, idmiembro, razonsocial, domfiscal', 'safe', 'on'=>'search'),
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
			'idmiembro0' => array(self::BELONGS_TO, 'Miembro', 'idmiembro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddatosfiscal' => 'Iddatosfiscal',
			'idmiembro' => 'Idmiembro',
			'razonsocial' => 'Razonsocial',
			'domfiscal' => 'Domfiscal',
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

		$criteria->compare('iddatosfiscal',$this->iddatosfiscal);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('razonsocial',$this->razonsocial,true);
		$criteria->compare('domfiscal',$this->domfiscal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datosfiscal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
