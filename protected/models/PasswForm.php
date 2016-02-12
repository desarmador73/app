<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 07:29 PM
 */
class PasswForm extends CFormModel
{
    public $oldpassw;
    public $newpassw;
    public $newpassw2;

    public function __construct()
    {

    }

    public function attributeLabels()
    {
        return array(
            'oldpassw'=>'Clave actual',
            'newpassw'=>'Nueva clave',
            'newpassw2'=>'Confirmar nueva clave',
        );
    }

    public function rules()
    {
        return array(
            array('oldpassw, newpassw, newpassw2', 'required'),

        );
    }

}