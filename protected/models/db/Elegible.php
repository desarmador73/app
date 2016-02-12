<?php

/**
 * This is the model class for table "elegible".
 *
 * The followings are the available columns in table 'elegible':
 * @property integer $idelegible
 * @property integer $idcargo
 * @property integer $idmiembro
 * @property integer $ideleccion
 * @property string $declino
 *
 * The followings are the available model relations:
 * @property Cargo $idcargo0
 * @property Eleccion $ideleccion0
 * @property Miembro $idmiembro0
 * @property Votacion[] $votacions
 */
class Elegible extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'elegible';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcargo, idmiembro, ideleccion, declino', 'required'),
			array('idcargo, idmiembro, ideleccion', 'numerical', 'integerOnly'=>true),
			array('declino', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idelegible, idcargo, idmiembro, ideleccion, declino', 'safe', 'on'=>'search'),
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
			'idcargo0' => array(self::BELONGS_TO, 'Cargo', 'idcargo'),
			'ideleccion0' => array(self::BELONGS_TO, 'Eleccion', 'ideleccion'),
			'idmiembro0' => array(self::BELONGS_TO, 'Miembro', 'idmiembro'),
			'votacions' => array(self::HAS_MANY, 'Votacion', 'idelegible'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idelegible' => 'Idelegible',
			'idcargo' => 'Idcargo',
			'idmiembro' => 'Idmiembro',
			'ideleccion' => 'Ideleccion',
			'declino' => 'Declino',
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

		$criteria->compare('idelegible',$this->idelegible);
		$criteria->compare('idcargo',$this->idcargo);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('ideleccion',$this->ideleccion);
		$criteria->compare('declino',$this->declino,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Elegible the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
