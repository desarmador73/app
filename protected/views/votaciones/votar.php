<?php
/* @var $this VotacionesController */

$this->breadcrumbs=array(
	'votar',
);
?>
<h2>Votaciones <small>preliminares</small></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$data,
    'enableSorting'=>true,
    'ajaxUpdate'=>true,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover table-condensed',
    'emptyText'=>'No se ha emitido ningún voto.',
    'columns'=>array(
        array(
            'name'=>'#',
            'type'=>'html',
            'value'=>function($data) {
                return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            }
        ),
        array(
            'name'=>'Nombre',
            'value'=>'$data["nombre"]',
        ),
        array(
            'name'=>'Cargo',
            'value'=>'$data["desccargo"]'
        ),
    ),
    'summaryText'=>'',
)); ?>


<!--<div class="row">-->
<!--    <div class="col-md-12">-->
    <?php
    $form=$this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'votaciones-form',
            'enableAjaxValidation' => true,
        )
    );
    ?>
    <?php
        $this->widget('zii.widgets.jui.CJuiTabs',array(
            'tabs'=>array(
                'Presidente'=>array(
                        'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'1'
                        ))),
                'Secretario'=>array(
                    'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'2'
                        ))),
                'Tesorero'=>array(
                    'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'3'
                        ))),
                'Mécanica Teórica'=>array(
                    'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'4'
                        ))),
                'Diseño Mecánico'=>array(
                    'ajax'=>$this->createAbsoluteUrl('votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'5'
                        ))),
                'Manufactura y Mat.'=>array(
                    'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'6'
                        ))),
                'Termofluidos'=>array(
                    'ajax'=>$this->createAbsoluteUrl('/votaciones/votacargo',
                        array(
                            'idetapa'=>$idetapa,
                            'idcargo'=>'7'
                        ))),
            ),
        ));    ?>
    <br />
    <?php echo CHtml::submitButton('Guardar votos',	array(
        'class' => 'btn btn-default',
        'id'=>'envia-votaciones',
        'name'=>'envia-votaciones',
        'confirm'=>'¿Esta seguro que desea guardar los cambios en las votaciones?',
    )); ?>
    &nbsp;
    <?php echo CHtml::submitButton('Enviar votos',	array(
		'class' => 'btn btn-default',
		'id'=>'confirma-votaciones',
		'name'=>'confirma-votaciones',
		'confirm'=>'¿Esta seguro que desea terminar con el proceso de votación?',
    )); ?>
    &nbsp;

    <a href="#" url="<?php echo $this->createUrl('/reportes/rptcomvota',array('idetapa'=>$idetapa)) ?>"
        alt="index.php?r=reportes/rptcompost"
        class="btn btn-info abrePdf"
        id="openPdfBtn">Comprobante</a>

    <?php $this->endWidget(); ?>

    <!-- Modal -->
    <div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         style="height: 60%; with:70%" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="myModalLabel">Comprobante voto -preliminar-</h4>
        </div>
        <div class="modal-body" style="height: 80%; with:80%" >
            <iframe src="" style="width:100%; height: 100%"></iframe>
        </div>
        <div class="modal-footer">
            <button class="btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

    <!-- col -->
    <!-- row -->
<script type="text/javascript">
	$(function () {
		$('.abrePdf').click(function () {
			var url = $(this).attr("url");
			//alert(url);
			$('#myModal').on('show', function () {
                alert('iframe');
				$('iframe').attr("src", url);
			});
			$('#myModal').modal({
				show: true
			})
		});
	});
</script>