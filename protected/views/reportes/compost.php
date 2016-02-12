<?php
/**
 * Created by PhpStorm.
 * User: enrique
 * Date: 23/10/15
 * Time: 10:32 AM
 */
/* @var $this DefaultController */
$this->pageTitle=Yii::app()->name . ' - Comprobante';
$mpdf = Yii::app()->ePdf->mpdf(
    'L',        // orientación
    'LETTER',	// tamaño de papel
    10,	        // tamaño de letra
    'Arial',	// tipo de letra
    20,         // margen izquierdo
    20,	        // margen derecho
    60,         // margen superior
    70,	        // margen inferior
    15,	        // margen titulo
    20	        // margen pie de página
);
$path = Yii::app()->basePath
    . '/..'
    . '/images/somim.png';
$fecha = date('d-m-Y H:i:s');
$numcomp = sprintf('%08d', $idelector);
/*
 *
 */
$header = '<img src=' .$path . ' alt=somim /> SOCIEDAD MEXICANA DE INGENIER&Iacute;A MEC&Aacute;NICA A.C:';
$html .= '<p style="text-align: center;">Comprobante de postulaci&oacute;n para las votaciones del Consejo Directivo 2014-2016</p>
<p>COMPROBANTE: ' . $numcomp . '</p>
<p>FECHA: ' .  $fecha . '</p>
<br>';
$html .= '<table width=100% cellspacing=0 cellpadding=2 border=1>
<col width=50%>
<col width=50%>
<caption>POSTULADOS</caption>
<thead>
<tr>
<th style=>CANDIDATO</th>
<th>CARGO</th>
</tr>
/thead>
<tbody>';
$datos_tabla = '';
foreach($votos as $key=>$val)
{
    $datos_tabla .= '<tr>';
    $datos_tabla .= '<td>' . $val['nombre'] . '</td>';
    $datos_tabla .= '<td>' . $val['cargo'] . '</td>';
    $datos_tabla .= '</tr>';
}
$html .= $datos_tabla;
$html .= '</tbody>
</table>';


$footer = '<p style="text-align: center;">Mitla No. 51, Col Independencia, Delegaci&oacute;n Benito Ju&aacute;rez, C.P. 03630, M&eacute;xico, D.F.</p>
<p style="text-align: center;">e-mail: armandoo@unam.mx</p>';

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($html);
$mpdf->Output();


exit;
?>