<?php

/**
 * This is the model class for table "dommiembro".
 *
 * The followings are the available columns in table 'dommiembro':
 * @property integer $iddomiciliomiembro
 * @property integer $idmiembro
 * @property string $calle
 * @property string $numero
 * @property string $colonia
 * @property string $municipio
 * @property string $ciudad
 * @property string $estado
 * @property string $codpostal
 * @property integer $idpais
 *
 * The followings are the available model relations:
 * @property Miembro $idmiembro0
 * @property Pais $idpais0
 */
class Dommiembro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dommiembro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmiembro, idpais', 'required'),
			array('idmiembro, idpais', 'numerical', 'integerOnly'=>true),
			array('calle, numero, colonia, municipio, ciudad, estado, codpostal', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iddomiciliomiembro, idmiembro, calle, numero, colonia, municipio, ciudad, estado, codpostal, idpais', 'safe', 'on'=>'search'),
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
			'idpais0' => array(self::BELONGS_TO, 'Pais', 'idpais'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddomiciliomiembro' => 'Iddomiciliomiembro',
			'idmiembro' => 'Idmiembro',
			'calle' => 'Calle',
			'numero' => 'Numero',
			'colonia' => 'Colonia',
			'municipio' => 'Municipio',
			'ciudad' => 'Ciudad',
			'estado' => 'Estado',
			'codpostal' => 'Codpostal',
			'idpais' => 'Idpais',
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

		$criteria->compare('iddomiciliomiembro',$this->iddomiciliomiembro);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('codpostal',$this->codpostal,true);
		$criteria->compare('idpais',$this->idpais);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dommiembro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
