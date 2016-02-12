<?php
Class VotacionesForm extends CFormModel
{

    public $idcargo_hidden;

    public function __construct()
	{

	}

    /*
     * Lista los elegibles por etapa y por cargo
     */
	public function listaElegibles($etapa, $cargo)
	{
		$_sql = "SELECT
			elegible.idelegible,
			CONCAT(miembro.apepat, ' ', miembro.apemat, ' ', miembro.nombre) AS nombre
			FROM
			elegible elegible
			JOIN miembro miembro USING(idmiembro)
			WHERE
			elegible.estado = '1'
			AND elegible.idetapavotacion = :idetapavotacion
			and elegible.ideleccion = :ideleccion
			AND elegible.idcargo = :idcargo
			ORDER BY
			miembro.apepat,
			miembro.apemat,
			miembro.nombre";
		$_params = array(
			':idetapavotacion'=>$etapa,
			':ideleccion'=>Commons::eleccionVigente()->ideleccion,
			':idcargo'=>$cargo,
		);
        Yii::log('_params ' . print_r($_params, true));

		return new CSqlDataProvider(
			Yii::app()->db->createCommand($_sql),
			array(
				'params'=> $_params,
				'keyField'=>'idelegible',
				'pagination'=>array(
					'pageSize'=>999,
				),
			));
	}

    /*
     * Lista los elegibles seleccionados actualmente por elector, cargo y etapa,
     * el estado puede ser 0 o 1, la lista es preliminar
     * @param $cargo
     * @param
     * @return array
     */
    public function listaElegiblesActual($etapa, $cargo)
    {
//        $_eleccion = Commons::eleccionVigente();
        $_selected = array();

        $_sql = "SELECT
			elegible.*
			FROM
			votacion votacion
			JOIN elegible elegible USING(idelegible)
			WHERE
			votacion.idelector = :idelector
			AND votacion.idetapavotacion = :idetapavotacion
			AND elegible.idcargo = :idcargo";
        $_params = array(
            ':idelector'=>Commons::electorVigente()->idelector,
            ':idcargo'=>$cargo,
            ':idetapavotacion'=>$etapa,
        );
        $reader = Yii::app()->db->createCommand($_sql)->query($_params);
        foreach ($reader as $row)
            array_push($_selected, $row['idelegible']);

//        Yii::log('eleccion ' . print_r($_eleccion, true));
        Yii::log('selected ' . print_r($_selected, true));
        return $_selected;
    }

    /*
     * Cuenta las votaciones que ya fueron enviadas
     */
    public function votacionEnviada($_etapa, $_cargo)
    {
        $_sql = "SELECT
			elegible.*
			FROM
			votacion
			JOIN elegible USING(idelegible)
			WHERE
			votacion.idelector = :idelector
			AND votacion.idetapavotacion = :idetapavotacion
			AND elegible.idcargo = :idcargo
			AND votacion.estado = '1'";
        $_params = array(
            ':idelector'=>Commons::electorVigente()->idelector,
            ':idcargo'=>$_cargo,
            ':idetapavotacion'=>$_etapa,
        );
        $reader = Yii::app()->db->createCommand($_sql)->query($_params);

        return ( count($reader)>0 )?true:false;
    }

    /*
     * Guarda los cambios en la votacion
     * @Param
     * @Param
     * @Param
     * @Param
     * @return
     */
    public function salvaVotacion($elegible, $cargo, $etapa)
    {
        $transaction=Yii::app()->db->beginTransaction();
        try
        {
            $idvotacion = self::buscaVotacion(
                Commons::electorVigente()->idelector, $cargo, $etapa);
            Yii::log('idvotacion ' . $idvotacion);

            $_votacion = null;
            if($idvotacion)
            {
                $_votacion = Votacion::model()->find('idvotacion='.$idvotacion);
                $_votacion->idelector = Commons::electorVigente()->idelector;
                $_votacion->idelegible = $elegible;
                $_votacion->idetapavotacion = $etapa;
                $_votacion->fechareg = new CDbExpression('NOW()');
                $_votacion->estado = '0';
                $_votacion->update();
            }
            else
            {
                $_votacion = new Votacion();
                $_votacion->idelector = Commons::electorVigente()->idelector;
                $_votacion->idelegible = $elegible;
                $_votacion->idetapavotacion = $etapa;
                $_votacion->fechareg = new CDbExpression('NOW()');
                $_votacion->estado = '0';
                $_votacion->save();
            }
        }
        catch(Exception $e)
        {
            Yii::log($e->getMessage(),'error');
            $transaction->rollback();
        }
        $transaction->commit();
    }

    /*
     * Valida es estado de un voto determinado
     *
     */
    public function buscaVotacion($elector, $cargo, $etapa)
    {
        $_sql = "SELECT
          votacion.idvotacion
        FROM
          votacion
          JOIN elegible USING (idelegible)
        WHERE
          votacion.idelector = :idelector
          AND elegible.idcargo = :idcargo
          AND votacion.idetapavotacion = :idetapavotacion";

        $_params = array(
            ':idelector'=>$elector,
            ':idcargo'=>$cargo,
            ':idetapavotacion'=>$etapa,
        );

        return  Yii::app()->db->createCommand($_sql)
            ->queryScalar($_params);
    }

    /*
     *
     */
    public function resumenVotacion($idetapa)
    {
        $_sql = "SELECT
          votacion.idvotacion,
          CONCAT(miembro.apepat, ' ', miembro.apemat, ' ', miembro.nombre) AS nombre,
          cargo.desccargo
        FROM
          votacion votacion
          JOIN elegible elegible USING (idelegible)
          JOIN miembro miembro USING (idmiembro)
          JOIN cargo cargo USING (idcargo)
        WHERE
          votacion.idelector = :idelector
          AND votacion.idetapavotacion = :idetapavotacion
        ORDER BY
          elegible.idcargo";
        $_params = array(
            ':idelector'=>Commons::electorVigente()->idelector,
            ':idetapavotacion'=>$idetapa
        );

        return new CSqlDataProvider(
            Yii::app()->db->createCommand($_sql),
            array(
                'params'=> $_params,
                'keyField'=>'idvotacion',
                'pagination'=>array(
                    'pageSize'=>999,
                ),
            ));
    }

    public function confirmaVotacion($_etapa)
    {

        $sql = "SELECT
		  votacion.idvotacion
		FROM
		  votacion
		  JOIN elegible USING (idelegible)
		WHERE
		  votacion.idelector = :idelector
		  AND elegible.ideleccion = :ideleccion
		  AND votacion.idetapavotacion = :idetapavotacion
		  AND votacion.estado = '0'";

        $_params = array(
            ':idelector'=>Commons::electorVigente()->idelector,
            ':ideleccion'=>Commons::eleccionVigente()->ideleccion,
            ':idetapavotacion'=>$_etapa,
        );
        Yii::log('Parametros ' . print_r($_params, true));
        $_list = Yii::app()->db->createCommand($sql)
            ->queryColumn($_params);
        Yii::log('Lista ' . print_r($_list, true));
        foreach($_list as $_item)
        {
            $votacion = Votacion::model()->find('idvotacion='.$_item);
            $votacion->estado = '1';
            $votacion->save();
        }
    }
}