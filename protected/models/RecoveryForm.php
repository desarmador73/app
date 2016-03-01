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
            array('email', 'required', 'message'=>'El campo {attribute} no puede estar vacio'),
            array('apepat', 'safe'),
        );
    }

    public function enviarCorreo($idmiembro) {
        $miembro = Miembro::model()->findByPk($idmiembro);
        Yii::log('miembro pwd ' . $miembro->password);

        $body  = "Sus datos de acceso al sistema de SOMIM son los siguientes:\n";
        $body .= "Dirección de correo electrónico: " . $miembro->email;
        $body .= "Contraseña: " . $miembro->password;

        $message = new YiiMailMessage();
        $message->subject = 'Acceso SOMIM';
        $message->setBody($body, 'text/html');
        $message->addTo($miembro->email);
        $message->from = 'root@somim2.org';

        Yii::app()->mail->send($message);
        return true;
    }

    public function buscaEmailMiembro($email) {
        $miembro = Miembro::model()->find('email=\''.$email.'\'');
        return ($miembro == null)?0:$miembro->idmiembro;
    }
}