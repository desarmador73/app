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
            array('nombre, email, telefono, calle, numero, colonia',
                'required',
                'message'=>'El campo {attribute} no puede estar vacio'),
            array('email, emailalt', 'email')
        );
    }

    public function guardaDatosGenerales($idmiembro)
    {
        $miembro = Miembro::model()->find('idmiembro='.$idmiembro);

        $datosacad = Datosacad::model()->find('idmiembro='.$idmiembro);

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

        if(isset($miembro)) {
            $miembro->save();
        } else {
            $miembro->update();
        }

    }

    public function cargaDatosGenerales($idmiembro)
    {
        $miembro = Miembro::model()->find('idmiembro='.$idmiembro);
        $dommiembro = Dommiembro::model()->find('idmiembro='.$idmiembro);
        $datosacad = Datosacad::model()->find('idmiembro='.$idmiembro);

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
            $datosgral->org = '';
            $datosgral->dep = '';
        }
        return $datosgral;
    }
}