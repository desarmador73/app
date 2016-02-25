<?php
/* @var $this UsuarioController */

$this->pageTitle=Yii::app()->name;

$this->breadcrumbs=array(
    'Datos personales',
);
?>
<?php if(Yii::app()->user->hasFlash('danger')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo Yii::app()->user->getFlash('danger'); ?>
    </div>
<?php endif; ?>
<?php $form=$this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'recovery-form',
        'enableAjaxValidation' => true,
        'enableClientValidation'=>true,
        'htmlOptions'=>array(),
    )
);?>
<fieldset>
    <legend>Restablecer contraseña</legend>
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
                    <?php echo CHtml::activeLabel($model,'email'); ?>
                    <?php echo CHtml::activeTextField($model,'email',
                        array('class'=>'form-control input-sm')) ?>
                    <span id="helpBlock" class="help-block">Por favor introduzca el correo electrónico que registró en la SOMIM. Se enviará un correo con sus datos de acceso.</span>
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
                            //'confirm'=>'¿Esta seguro que desea actualizar su contraseña?',
                        )); ?>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
