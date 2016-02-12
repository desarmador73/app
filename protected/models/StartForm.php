<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 18/01/16
 * Time: 11:20 AM
 */

class StartForm extends CFormModel
{
    /*
     *
     */
    public function hayVotacionActiva()
    {
        $_activa = false;
        $_eleccion = Eleccion::model()->find("estado='1'");
        # Yii::log("_eleccion " . print_r($_eleccion, true));
        if($_eleccion)
        {
            # Yii::log("time " . time());
            # Yii::log("fecini " . strtotime($_eleccion->fecini));
            # Yii::log("fecfin " . strtotime($_eleccion->fecfin));

            if( (time() >= strtotime($_eleccion->fecini)) && (time() <= strtotime($_eleccion->fecfin)) )
                $_activa = true;
            else
                Yii::log("La eleccion no esta dentro del periodo");
        } else
            Yii::log("No hay eleccion activa");
        return $_activa;
    }

    /*
     *
     */
    public function usuarioPadronActivo()
    {
        $_activa = false;
        $_elector = Elector::model()->find("idmiembro=:idmiembro and ideleccion=:ideleccion and estado=:estado",
            array(
                ':idmiembro' => Commons::miembroActivo()->idmiembro,
                'ideleccion' => Commons::eleccionVigente()->ideleccion,
                ':estado' => '1'));
        if($_elector)
            $_activa = true;
        else
            Yii::log("El miembro no esta registrado como elector");
        return $_activa;
    }

    /*
     * Cambia el style del bloque span en caso que se deba mostrar u ocultar el icono de votaciones
     * @return boolean
     */
    public function muestraIconoVotacion()
    {
        $_display = 'none';
        if($this->hayVotacionActiva() && $this->usuarioPadronActivo())
            $_display = 'inline';
        return $_display;
    }

    /*
     * Cambia el style del bloque span en caso que se deba mostrar u ocultar el icono de administrador
     * @return boolean
     */
    public function muestraIconoAdmin()
    {
        $_display = 'none';
        if(Commons::validaCargo(Commons::miembroActivo()->idmiembro, 1))
            $_display = 'inline';
        return $_display;
    }

    /*
     * Cambia el style del bloque span en caso que se deba mostrar u ocultar el icono de tesorero
     * @return boolean
     */
    public function muestraIconoTesorero()
    {
        $_display = 'none';
        if(Commons::validaCargo(Commons::miembroActivo()->idmiembro, 3))
            $_display = 'inline';
        return $_display;
    }

    /*
     * Cambia el style del bloque span en caso que se deba mostrar u ocultar el icono de vicepresidente
     * @return boolean
     */
    public function muestraIconoVisepres()
    {
        $_display = 'none';
        $_vis4 = Commons::validaCargo(Commons::miembroActivo()->idmiembro, 4);
        $_vis5 = Commons::validaCargo(Commons::miembroActivo()->idmiembro, 5);
        $_vis6 = Commons::validaCargo(Commons::miembroActivo()->idmiembro, 6);
        $_vis7 = Commons::validaCargo(Commons::miembroActivo()->idmiembro, 7);

        if($_vis4 || $_vis5 || $_vis6 || $_vis7)
            $_display = 'inline';
        return $_display;
    }

    public function muestraIcono()
    {
        return 'inline';
    }

    public function renderIcon($_glyphicon, $_text) {
        return  '<li>'
            //. PHP_EOL
            . '<span class="glyphicon glyphicon-'
            . $_glyphicon
            . '" aria-hidden="true"></span>'
            //. PHP_EOL
            . '<span class="glyphicon-class">'
            . $_text
            . '</span>'
            //. PHP_EOL
            . '</li>'
            . PHP_EOL;
    }
}