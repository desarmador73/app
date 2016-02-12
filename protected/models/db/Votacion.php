<?php

/**
 * This is the model class for table "votacion".
 *
 * The followings are the available columns in table 'votacion':
 * @property integer $idvotacion
 * @property integer $idelector
 * @property integer $idelegible
 * @property string $fechareg
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Elector $idelector0
 * @property Elegible $idelegible0
 */
class Votacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'votacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idelector, idelegible', 'required'),
			array('idelector, idelegible', 'numerical', 'integerOnly'=>true),
			array('fechareg', 'safe'),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idvotacion, idelector, idelegible, fechareg', 'safe', 'on'=>'search'),
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
			'idelector0' => array(self::BELONGS_TO, 'Elector', 'idelector'),
			'idelegible0' => array(self::BELONGS_TO, 'Elegible', 'idelegible'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idvotacion' => 'Idvotacion',
			'idelector' => 'Idelector',
			'idelegible' => 'Idelegible',
			'fechareg' => 'Fechareg',
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

		$criteria->compare('idvotacion',$this->idvotacion);
		$criteria->compare('idelector',$this->idelector);
		$criteria->compare('idelegible',$this->idelegible);
		$criteria->compare('fechareg',$this->fechareg,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Votacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
