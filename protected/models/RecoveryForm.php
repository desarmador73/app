<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 19/01/16
 * Time: 06:07 PM
 */
class RecoveryForm extends CFormModel
{
    public $email;

    public function __construct()
    {

    }

    public function attributeLabels()
    {
        return array(
            'email' => 'Correo registrado en SOMIM'
        );
    }

    public function rules()
    {
        return array(
            array('email', 'required'),
        );
    }
}