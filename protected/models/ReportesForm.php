<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 11:20 AM
 */

class ReportesForm extends CFormModel
{
    public function foo()
    {
        return 0;
    }


    public function rptVotosPorMiembro($etapa)
    {
        $_selected = array();
        $_sql = "SELECT
			CONCAT_WS(' ', UPPER(miembro.apepat), UPPER(miembro.apemat), UPPER(miembro.nombre)) as nombre,
			UPPER(cargo.desccargo) as cargo
			from
			votacion votacion
			JOIN elector elector USING(idelector)
			JOIN elegible elegible USING(idelegible)
			JOIN miembro miembro ON miembro.idmiembro = elegible.idmiembro
			JOIN cargo cargo USING(idcargo)
			WHERE
			elector.idelector = :idelector
			AND elegible.ideleccion = :ideleccion
			AND elegible.estado = '1'
			AND votacion.idetapavotacion  = :idetapavotacion
			ORDER BY
			cargo.idcargo";
        $_params = array(
            ':idelector'=>Commons::electorVigente()->idelector,
            ':ideleccion'=>Commons::eleccionVigente()->ideleccion,
            ':idetapavotacion'=>$etapa,
        );
        $reader = Yii::app()->db->createCommand($_sql)->query($_params);
        foreach ($reader as $row)
        {
            array_push($_selected, array(
                'nombre'=>$row['nombre'],
                'cargo'=>$row['cargo']));
        }
        return $_selected;
    }
}