<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->breadcrumbs=array(
    'Contraseña',
);
?>

<?php $form=$this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'password-form',
        'enableAjaxValidation' => true,
        'enableClientValidation'=>true,
        'htmlOptions'=>array(),
    )
);?>
<fieldset>
    <legend>Cambiar contraseña</legend>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <!-- errores -->
                    <?php echo CHtml::errorSummary($model); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo CHtml::activeLabel($model,'oldpassw'); ?>
                    <?php echo CHtml::activeTextField($model,'oldpassw',
                        array('class'=>'form-control input-sm')) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo CHtml::activeLabel($model,'newpassw'); ?>
                    <?php echo CHtml::activeTextField($model,'newpassw',
                        array('class'=>'form-control input-sm')) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo CHtml::activeLabel($model,'newpassw2'); ?>
                    <?php echo CHtml::activeTextField($model,'newpassw2',
                        array('class'=>'form-control input-sm')) ?>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4">
                    <?php echo CHtml::submitButton('Aceptar',
                        array(
                            'class' => 'btn btn-success',
                            'id'=>'salva-miembro',
                            'name'=>'salva-miembro',
                            'confirm'=>'¿Esta seguro que desea actualizar su contraseña?',
                        )); ?>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
