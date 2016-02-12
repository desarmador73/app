<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 01:28 PM
 */

class VotacionesController extends Controller
{
    public $layout = '//layouts/vota';



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

    public function actionVotar($idetapa)
    {
        $model = new VotacionesForm();
        $idcargo = null;
        Yii::log('POST ' . print_r($_POST, true));

        if(isset($_POST['envia-votaciones']))
        {
            Yii::log('idelegible ' . $_POST['cid'][0]
                . ' idcargo ' . $_POST['VotacionesForm']['idcargo_hidden']
                . ' idetapa ' . $idetapa);

            if(isset($_POST['VotacionesForm']['idcargo_hidden']))
            {
                $idcargo = $_POST['VotacionesForm']['idcargo_hidden'];
            }
            if(isset($_POST['cid']))
            {
                $idelegible = $_POST['cid'][0];
                $model->salvaVotacion($idelegible, $idcargo, $idetapa);
            }
        }
        else if(isset($_POST['confirma-votaciones']))
        {
            // Guarda como definitivas las votaciones
            $model->confirmaVotacion($idetapa);
        }

        $this->render('votar',
            array(
                'idetapa'=>$idetapa,
                'idelector'=>Commons::electorVigente()->idelector,
                'data'=>$model->resumenVotacion($idetapa),
            ));
    }

    public function actionVotacargo($idetapa, $idcargo)
    {
        Yii::log('actionVotacargo');
        $this->layout="borderless";
        $model = new VotacionesForm();
        //
        $this->render('votacargo',
            array(
                'model'=>$model,
                'data' => $model->listaElegibles($idetapa, $idcargo),
                'selected'=>$model->listaElegiblesActual($idetapa, $idcargo),
                'enabled'=>$model->votacionEnviada($idetapa, $idcargo),
            ));
    }


}