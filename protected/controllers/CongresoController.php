<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:28 PM
 */

class CongresoController extends Controller
{
    public $layout = '//layouts/congreso';

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

    public function actionIndex()
    {
        $this->render('index');
    }
}