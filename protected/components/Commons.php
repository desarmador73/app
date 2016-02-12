<?php
// protected/components/Commons.php

class Commons
{
	public static function eleccionVigente()
	{
		return Eleccion::model()->find("estado='1'");
	}

	public static function miembroActivo()
	{
		return Miembro::model()->find('email=:email',
			array(':email' => Yii::app()->user->name));
	}

    /*
     *
     */
    public static function electorVigente()
    {
//        Yii::log('idmiembro ' . self::miembroActivo()->idmiembro);
//        Yii::log('ideleccion ' . self::eleccionVigente()->ideleccion);
        return Elector::model()->find('idmiembro=:idmiembro and ideleccion=:ideleccion and estado=:estado',
            array(
                ':idmiembro'=>self::miembroActivo()->idmiembro,
                ':ideleccion'=>self::eleccionVigente()->ideleccion,
                ':estado'=>'1'
            ));
    }

    /*
     * Valida si un miembro tiene un cargo vigente
     * @param int idmiembro
     * @param int idcargo
     * @return boolean
     */
    public static function validaCargo($_idmiembro, $_idcargo)
    {
        $_sql = "SELECT
          miembro.idmiembro
        FROM
          miembro
          JOIN cargomiembro USING (idmiembro)
        WHERE
          cargomiembro.idcargo = :idcargo
          AND miembro.idmiembro = :idmiembro
          AND cargomiembro.estado = :estado";
        $_params = array(
            ':idcargo' => $_idcargo,
            ':idmiembro' => $_idmiembro,
            ':estado' => '1');

        Yii::log('_params ' . print_r($_params, true));
        $_idmiembro = Yii::app()->db->createCommand($_sql)
            ->queryScalar($_params);
        Yii::log('_idmiembro ' . $_idmiembro);
        return ($_idmiembro)?true:false;
    }
}