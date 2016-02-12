<?php

/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 25/01/16
 * Time: 01:41 PM
 */
class ReportesController extends Controller
{

    /*
     * Genera el comprobante de la votacion
     */
    public function actionRptcomvota($idetapa)
    {
        $model = new ReportesForm();

        $this->render('rptcomvota',
            array(
                'votos' => $model->rptVotosPorMiembro($idetapa),
                'idelector' => Commons::electorVigente()));
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
                'actions'=>array('index'),
                'users'=>array('?'),
            ),
        );
    }
}