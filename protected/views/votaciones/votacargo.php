<?php
/* @var $this VotacionesController */

$this->pageTitle=Yii::app()->name;

$this->breadcrumbs=array(
    'Vota cargo',
);
?>
<div class="row">
    <div class="col-md-9" role="main">
        <?php echo CHtml::activeHiddenField($model, 'idcargo_hidden', array('value'=>$_GET['idcargo'])); ?>
        <?php $this->widget('SomimGridView', array(
            'dataProvider'=>$data,
            'enableSorting'=>true,
            'ajaxUpdate'=>true,
            'cssFile'=>false,
            'itemsCssClass'=>'table table-striped table-bordered table-hover table-condensed',
            'emptyText'=>'No se encontraron miembros elegibles en este cargo.',
            'selected'=>$selected,
            'disabled'=>$enabled,
            'columns'=>array(
                array(
                    'name'=>'#',
                    'value'=>'CHtml::radioButton("cid[]",'
                        . 'in_array($data["idelegible"], $this->grid->selected)'
                        . ',array("value"=>$data["idelegible"],"id"=>"cid1_".$data["idelegible"],"disabled"=>$this->grid->disabled))',
                    'type'=>'raw',
                    'htmlOptions'=>array(
                        'width'=>5),
                ),

                array(
                    'name'=>'Nombre',
                    'value'=>'$data["nombre"]'),


            ),
            'summaryText'=>'',
        )); ?>
    </div>
</div>