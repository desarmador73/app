<?php

/**
 * This is the model class for table "elector".
 *
 * The followings are the available columns in table 'elector':
 * @property integer $idelector
 * @property integer $idmiembro
 * @property integer $ideleccion
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Eleccion $ideleccion0
 * @property Miembro $idmiembro0
 * @property Votacion[] $votacions
 */
class Elector extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'elector';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmiembro, ideleccion, estado', 'required'),
			array('idmiembro, ideleccion', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idelector, idmiembro, ideleccion, estado', 'safe', 'on'=>'search'),
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
			'ideleccion0' => array(self::BELONGS_TO, 'Eleccion', 'ideleccion'),
			'idmiembro0' => array(self::BELONGS_TO, 'Miembro', 'idmiembro'),
			'votacions' => array(self::HAS_MANY, 'Votacion', 'idelector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idelector' => 'Idelector',
			'idmiembro' => 'Idmiembro',
			'ideleccion' => 'Ideleccion',
			'estado' => 'Estado',
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

		$criteria->compare('idelector',$this->idelector);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('ideleccion',$this->ideleccion);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Elector the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
