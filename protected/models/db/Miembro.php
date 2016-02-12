<?php

/**
 * This is the model class for table "miembro".
 *
 * The followings are the available columns in table 'miembro':
 * @property integer $idmiembro
 * @property string $rfc
 * @property string $apepat
 * @property string $apemat
 * @property string $nombre
 * @property string $email
 * @property string $emailalt
 * @property string $password
 * @property string $telefono
 * @property integer $idtipomiembro
 * @property string $fechareg
 * @property string $arbitro
 * @property string $activo
 * @property string $areaespecial
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Areainteresmiembro[] $areainteresmiembros
 * @property Cargomiembro[] $cargomiembros
 * @property Datosacad[] $datosacads
 * @property Datosfiscal[] $datosfiscals
 * @property Dommiembro[] $dommiembros
 * @property Elector[] $electors
 * @property Elegible[] $elegibles
 * @property Membresia[] $membresias
 * @property Tipomiembro $idtipomiembro0
 */
class Miembro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'miembro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, email, password, idtipomiembro, fechareg', 'required'),
			array('idtipomiembro', 'numerical', 'integerOnly'=>true),
			array('rfc, apepat, apemat, nombre, email, emailalt, password, telefono', 'length', 'max'=>45),
			array('arbitro', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idmiembro, rfc, apepat, apemat, nombre, email, emailalt, password, telefono, idtipomiembro, fechareg, arbitro', 'safe', 'on'=>'search'),
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
			'areainteresmiembros' => array(self::HAS_MANY, 'Areainteresmiembro', 'idmiembro'),
			'cargomiembros' => array(self::HAS_MANY, 'Cargomiembro', 'idmiembro'),
			'datosacads' => array(self::HAS_MANY, 'Datosacad', 'idmiembro'),
			'datosfiscals' => array(self::HAS_MANY, 'Datosfiscal', 'idmiembro'),
			'dommiembros' => array(self::HAS_MANY, 'Dommiembro', 'idmiembro'),
			'electors' => array(self::HAS_MANY, 'Elector', 'idmiembro'),
			'elegibles' => array(self::HAS_MANY, 'Elegible', 'idmiembro'),
			'membresias' => array(self::HAS_MANY, 'Membresia', 'idmiembro'),
			'idtipomiembro0' => array(self::BELONGS_TO, 'Tipomiembro', 'idtipomiembro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmiembro' => 'Idmiembro',
			'rfc' => 'Rfc',
			'apepat' => 'Apepat',
			'apemat' => 'Apemat',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'emailalt' => 'Emailalt',
			'password' => 'Password',
			'telefono' => 'Telefono',
			'idtipomiembro' => 'Idtipomiembro',
			'fechareg' => 'Fechareg',
			'arbitro' => 'Arbitro',
			'activo' => 'Activo',
			'areaespecial' => 'Área de especialidad'
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

		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('apepat',$this->apepat,true);
		$criteria->compare('apemat',$this->apemat,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('emailalt',$this->emailalt,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('idtipomiembro',$this->idtipomiembro);
		$criteria->compare('fechareg',$this->fechareg,true);
		$criteria->compare('arbitro',$this->arbitro,true);
        $criteria->compare('activo',$this->activo,true);
        $criteria->compare('areaespecial',$this->areaespecial,true);
        $criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Miembro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
