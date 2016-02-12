<?php

/**
 * This is the model class for table "eleccion".
 *
 * The followings are the available columns in table 'eleccion':
 * @property integer $ideleccion
 * @property integer $idperiodo
 * @property string $descripcion
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Periodo $idperiodo0
 * @property Elector[] $electors
 * @property Elegible[] $elegibles
 */
class Eleccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eleccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idperiodo, estado', 'required'),
			array('idperiodo', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ideleccion, idperiodo, descripcion, estado', 'safe', 'on'=>'search'),
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
			'idperiodo0' => array(self::BELONGS_TO, 'Periodo', 'idperiodo'),
			'electors' => array(self::HAS_MANY, 'Elector', 'ideleccion'),
			'elegibles' => array(self::HAS_MANY, 'Elegible', 'ideleccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ideleccion' => 'Ideleccion',
			'idperiodo' => 'Idperiodo',
			'descripcion' => 'Descripcion',
			'fecini' => 'Fecha de inicio',
			'fecfin' => 'Fecha de termino',
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

		$criteria->compare('ideleccion',$this->ideleccion);
		$criteria->compare('idperiodo',$this->idperiodo);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Eleccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
