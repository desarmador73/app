<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:28 PM
 */

class UsuarioController extends Controller
{
    public $layout = '//layouts/main';

    public function actionDatosgral()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model = new DatosgralForm();
        $model = $model->cargaDatosGenerales(
            Commons::miembroActivo()->idmiembro);


        if(isset($_POST['DatosgralForm']))
        {
//            $valid = true;

            $model->attributes = $_POST['DatosgralForm'];
            $valid = $model->validate();
            Yii::log('submit -> '.print_r($_POST, true));

            if($valid)
            {
                $model->guardaDatosGenerales(Commons::miembroActivo()->idmiembro);
            }
        }



        $this->render('datosgral',
            array('model' => $model));
    }

    public function actionPassword()
    {
        $model = new PasswForm();

        $this->render('password',
            array('model' => $model));
    }

    public function actionNuevo()
    {
        $model = new NewForm();

        $this->render('nuevo',
            array('model' => $model));
    }

    public function actionRestaurar()
    {
        $model = new RecoveryForm();

        $this->render('restaurar',
            array('model' => $model));
    }

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('datosgral, password'),
                'users'=>array('?'),
            ),
        );
    }

    public function accionVotaciones()
    {
        $model = new VotacionesForm();

        $this->render('votaciones',
            array(
                'etapa'=>$etapa,
                'idelector'=>0,
            ));
    }
}