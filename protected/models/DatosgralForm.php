<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:27 PM
 */
class DatosgralForm extends CFormModel
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
        );
    }

    public function rules()
    {
        return array(
            array('nombre, email, telefono, calle, numero, colonia, pais',
                'required',
                'message'=>'El campo {attribute} no puede estar vacio'),
            array('email, emailalt', 'email'),
            array('apepat, apemat, org, otro, dep, municipio, codpostal, ciudad, estado, areaespe, campoint', 'safe'),
        );
    }

    public function guardaDatosGenerales($idmiembro)
    {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $miembro = Miembro::model()->find('idmiembro=' . $idmiembro);
            if ($miembro == null) {
                $miembro = new Miembro();
            }
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
            Yii::log('save miembro ' . $miembro->save());

            /*
             *
             */

            $datosacad = Datosacad::model()->find('idmiembro='.$idmiembro);
            if ($datosacad === null) {
                $datosacad = new Datosacad();
            }
            $datosacad = new Datosacad();
            $datosacad->idorganizacion = Organizacion::model()->
            find('idorganizacion=' . $this->org)->idorganizacion;
            $datosacad->idmiembro = $miembro->idmiembro;
            $datosacad->dependencia = $this->dep;
            $datosacad->departamento = $this->dep;
            $datosacad->otro = $this->otro;
            //Yii::log('datosacad ' . print_r($datosacad, true));
            Yii::log('save datosacad ' . $datosacad->save());


            /*
             *
             */
            $dommiembro = Dommiembro::model()->find('idmiembro='.$idmiembro);
            if($dommiembro === null) {
                $dommiembro = new Dommiembro();
            }
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
            Yii::log('save dommiembro ' . $dommiembro->save());


            /*
             *
             */
            $areainteresmiembro = Areainteresmiembro::model()->findAll(
                'idmiembro='.$idmiembro . " AND estado='1'");
            // Limpia los datos anteriores
            foreach($areainteresmiembro as $item) {
                $item->delete();
            }

            foreach($this->campoint as $item) {
                $aux = new Areainteresmiembro();
                $aux->idmiembro = $miembro->idmiembro;
                $aux->idareainteres = $item;
                $aux->estado = '1';
                Yii::log('save areainteresmiembro ' . $aux->insert());
            }

            $transaction->commit();
        } catch (Exception $ex) {
            $transaction->rollback();
            return false;
            die('FAILED!!!');
        }
        return true;
    }

    public function cargaDatosGenerales($idmiembro)
    {
        $miembro = Miembro::model()->find('idmiembro='.$idmiembro);
        $dommiembro = Dommiembro::model()->find('idmiembro='.$idmiembro);
        $datosacad = Datosacad::model()->find('idmiembro='.$idmiembro);
        $areainteresmiembro = Areainteresmiembro::model()->findAll('idmiembro='.$idmiembro);

        $datosgral = new DatosgralForm();

        if(isset($miembro))
        {
            $datosgral->idmiembro = $miembro->idmiembro;
            $datosgral->apepat = $miembro->apepat;
            $datosgral->apemat = $miembro->apemat;
            $datosgral->nombre = $miembro->nombre;
            $datosgral->email = $miembro->email;
            $datosgral->emailalt = $miembro->emailalt;
            $datosgral->telefono = $miembro->telefono;
            $datosgral->areaespe = $miembro->areaespecial;
        }

        if(isset($dommiembro))
        {
            $datosgral->calle = $dommiembro->calle;
            $datosgral->numero = $dommiembro->numero;
            $datosgral->colonia = $dommiembro->colonia;
            $datosgral->municipio = $dommiembro->municipio;
            $datosgral->codpostal = $dommiembro->codpostal;
            $datosgral->ciudad = $dommiembro->ciudad;
            $datosgral->estado = $dommiembro->estado;
            $datosgral->pais = $dommiembro->idpais;
        }

        if(isset($datosacad))
        {
            $datosgral->org = $datosacad->idorganizacion;
            $datosgral->dep = $datosacad->departamento;
            $datosgral->otro = $datosacad->otro;
        }

        $aux = array();
        if(isset($areainteresmiembro))
        {
            foreach($areainteresmiembro as $areaint) {
                array_push($aux, $areaint->idareainteres);
            }
        }
        $datosgral->campoint = $aux;

        return $datosgral;
    }
}