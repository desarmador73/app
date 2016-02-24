<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:27 PM
 */
class NewForm extends CFormModel
{
    public $idmiembro;
    //
    public $apepat;
    public $apemat;
    public $nombre;
    public $email;
    public $emailalt;
    public $telefono;
    //
    public $org;
    public $dep;
    public $otro;
    //
    public $calle;
    public $numero;
    public $colonia;
    public $municipio;
    public $codpostal;
    public $ciudad;
    public $estado;
    public $pais;
    //
    public $campoint;
    public $areaespe;
    //
    public $passw;
    public $passw2;

    public function __construct()
    {

    }

    public function attributeLabels()
    {
        return array(
            'apepat'=>'Apellido paterno',
            'apemat'=>'Apellido materno',
            'nombre'=>'Nombre',
            'email'=>'Correo electrónico',
            'emailalt'=>'Correo electrónico alternativo',
            'telefono'=>'Teléfono',
            'org'=>'Organización',
            'dep'=>'Dependencia',
            'otro'=>'Otra',
            'calle'=>'Calle',
            'numero'=>'Número',
            'colonia'=>'Colonia',
            'municipio'=>'Municipio',
            'codpostal'=>'Código postal',
            'ciudad'=>'Ciudad',
            'estado'=>'Estado',
            'pais'=>'País',
            'campoint'=>'Campo de la mecánica de interés',
            'areaespe'=>'Área de especialidad',
            'passw'=>'Contraseña',
            'passw2'=>'Repetir contraseña',
        );
    }

    public function rules()
    {
        return array(
            array('nombre, email, telefono, calle, numero, colonia, pais, passw, passw2',
                'required',
                'message'=>'El campo {attribute} no puede estar vacio'),
            array('email, emailalt', 'email', 'message'=>'La dirección de correo no tiene el formato correcto'),
            array('passw', 'compare', 'compareAttribute'=>'passw2','message'=>'Las contraseñas deben ser iguales'),
            array('apepat, apemat, org, otro, dep, municipio, codpostal, ciudad, estado, areaespe, campoint, passw, passw2', 'safe'),
        );
    }

    public function guardaDatosGenerales($idmiembro=0)
    {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $miembro = new Miembro();
            $miembro->apepat = $this->apepat;
            $miembro->apemat = $this->apemat;
            $miembro->nombre = $this->nombre;
            $miembro->email = $this->email;
            $miembro->emailalt = $this->emailalt;
            $miembro->telefono = $this->telefono;
            $miembro->fechareg = date("Y-m-d H:i:s");
            $miembro->arbitro = null;
            $miembro->activo = null;
            $miembro->areaespecial = $this->areaespe;
            $miembro->estado = '1';
            $miembro->password = $this->passw;
            $miembro->idtipomiembro = 3; //Asociado
            Yii::log('insert miembro ' . $miembro->insert());
            /*
             *
             */
            $datosacad = new Datosacad();
            $datosacad = new Datosacad();
            $datosacad->idorganizacion = Organizacion::model()->
                find('idorganizacion=' . $this->org)->idorganizacion;
            $datosacad->idmiembro = $miembro->idmiembro;
            $datosacad->dependencia = $this->dep;
            $datosacad->departamento = $this->dep;
            $datosacad->otro = $this->otro;
            //Yii::log('datosacad ' . print_r($datosacad, true));
            Yii::log('insert datosacad ' . $datosacad->insert());
            /*
             *
             */
            $dommiembro = new Dommiembro();
            $dommiembro->calle = $this->calle;
            $dommiembro->numero = $this->numero;
            $dommiembro->colonia = $this->colonia;
            $dommiembro->municipio = $this->municipio;
            $dommiembro->ciudad = $this->ciudad;
            $dommiembro->estado = $this->estado;
            $dommiembro->codpostal = $this->codpostal;
            $dommiembro->idpais = Pais::model()->
                find('idpais='.$this->pais)->idpais;
            $dommiembro->idmiembro = $miembro->idmiembro;
            Yii::log('insert dommiembro ' . $dommiembro->insert());
            /*
             *
             */
            foreach($this->campoint as $item) {
                $aux = new Areainteresmiembro();
                $aux->idmiembro = $miembro->idmiembro;
                $aux->idareainteres = $item;
                $aux->estado = '1';
                Yii::log('insert areainteresmiembro ' . $aux->insert());
            }
            /*
             *
             */

            $transaction->commit();
        } catch (Exception $ex) {
            $transaction->rollback();
            return false;
            die('FAILED!!!');
        }
        return true;
    }
}