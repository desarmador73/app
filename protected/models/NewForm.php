<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:27 PM
 */
class NewForm extends CFormModel
{
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
            'passw2'=>'Repita su contraseña',
        );
    }

    public function rules()
    {
        return array(
            array('nombre, email, telefono, calle, numero, colonia, passw, pass2', 'required'),
            array('email, emailalt', 'email'),
        );
    }
}