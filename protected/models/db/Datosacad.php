<?php

/**
 * This is the model class for table "datosacad".
 *
 * The followings are the available columns in table 'datosacad':
 * @property integer $iddatosacad
 * @property integer $idorganizacion
 * @property integer $idmiembro
 * @property string $dependencia
 * @property string $departamento
 *
 * The followings are the available model relations:
 * @property Miembro $idmiembro0
 * @property Organizacion $idorganizacion0
 */
class Datosacad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datosacad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idorganizacion, idmiembro', 'required'),
			array('idorganizacion, idmiembro', 'numerical', 'integerOnly'=>true),
			array('dependencia, departamento', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddatosacad, idorganizacion, idmiembro, dependencia, departamento', 'safe', 'on'=>'search'),
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
			'idorganizacion0' => array(self::BELONGS_TO, 'Organizacion', 'idorganizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddatosacad' => 'Iddatosacad',
			'idorganizacion' => 'Idorganizacion',
			'idmiembro' => 'Idmiembro',
			'dependencia' => 'Dependencia',
			'departamento' => 'Departamento',
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

		$criteria->compare('iddatosacad',$this->iddatosacad);
		$criteria->compare('idorganizacion',$this->idorganizacion);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('departamento',$this->departamento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datosacad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
