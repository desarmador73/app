<?php

/**
 * This is the model class for table "tipomiembro".
 *
 * The followings are the available columns in table 'tipomiembro':
 * @property integer $idtipomiembro
 * @property string $desctipomiembro
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Miembro[] $miembros
 */
class Tipomiembro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipomiembro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desctipomiembro, estado', 'required'),
			array('desctipomiembro', 'length', 'max'=>255),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtipomiembro, desctipomiembro, estado', 'safe', 'on'=>'search'),
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
			'miembros' => array(self::HAS_MANY, 'Miembro', 'idtipomiembro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipomiembro' => 'Idtipomiembro',
			'desctipomiembro' => 'Desctipomiembro',
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

		$criteria->compare('idtipomiembro',$this->idtipomiembro);
		$criteria->compare('desctipomiembro',$this->desctipomiembro,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tipomiembro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
