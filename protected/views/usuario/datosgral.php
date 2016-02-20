<?php
/* @var $this SiteController */

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
        'id' => 'datosper-form',
        'enableAjaxValidation' => true,
        'enableClientValidation'=>true,
//        'htmlOptions'=>array(),
        'focus'=>array($model, 'apepat')
    )
);?>

    <fieldset>
        <legend>Datos personales</legend>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- errores -->
                        <?php echo $form->errorSummary($model,
                            '<strong>Por favor corrija los siguentes errores:</strong><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>',
                            '',
                            array('class' => 'alert alert-danger')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'apepat'); ?>
                        <?php echo CHtml::activeTextField($model,'apepat',
                            array('class'=>'form-control input-sm')) ?>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'apemat'); ?>
                        <?php echo CHtml::activeTextField($model,'apemat',
                            array('class'=>'form-control input-sm')) ?>
                    </div><!--/span-->
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'nombre'); ?>
                        <?php echo CHtml::activeTextField($model,'nombre',
                            array('class'=>'form-control input-sm')) ?>
                    </div><!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'email'); ?>
                        <?php echo CHtml::activeTextField($model,'email',
                            array('class'=>'form-control input-sm')) ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'emailalt'); ?>
                        <?php echo CHtml::activeTextField($model,'emailalt',
                            array('class'=>'form-control input-sm')) ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo CHtml::activeLabel($model,'telefono'); ?>
                        <?php echo CHtml::activeTextField($model,'telefono',
                            array('class'=>'form-control input-sm')) ?>
                    </div>
                </div>
            </div><!-- span8 -->
        </div><!-- row -->
    </fieldset>
    <br/>
    <fieldset>
        <legend>Organización en la que labora</legend>
        <div class="row">
            <div class="col-md-6">
                <?php echo CHtml::activeLabel($model,'org'); ?>
                <?php echo CHtml::activeDropDownList(
                    $model,
                    'org',
                    CHtml::listData(Organizacion::model()->findAll(), 'idorganizacion', 'descorganizacion'),
                    array('prompt'=>'Seleccione...',
                        'class'=>'form-control input-sm')
                ); ?>
            </div>
            <div class="col-md-6">
                <?php echo CHtml::activeLabel($model,'otro'); ?>
                <?php echo CHtml::activeTextField($model,'otro',
                    array('class'=>'form-control input-sm')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo CHtml::activeLabel($model,'dep'); ?>
                <?php echo CHtml::activeTextField($model,'dep',
                    array('class'=>'form-control input-sm')) ?>
            </div>
        </div>
    </fieldset>
    <br/>
    <fieldset>
        <legend>Domicilio al que desea se le envíe información de SOMIM</legend>
        <div class="row">
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'calle'); ?>
                <?php echo CHtml::activeTextField($model,'calle',
                    array('class'=>'form-control input-sm')) ?>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'numero'); ?>
                <?php echo CHtml::activeTextField($model,'numero',
                    array('class'=>'form-control input-sm')) ?>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'colonia'); ?>
                <?php echo CHtml::activeTextField($model,'colonia',
                    array('class'=>'form-control input-sm')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'municipio'); ?>
                <?php echo CHtml::activeTextField($model,'municipio',
                    array('class'=>'form-control input-sm')) ?>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'codpostal'); ?>
                <?php echo CHtml::activeTextField($model,'codpostal',
                    array('class'=>'form-control input-sm')) ?>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'ciudad'); ?>
                <?php echo CHtml::activeTextField($model,'ciudad',
                    array('class'=>'form-control input-sm')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php echo CHtml::activeLabel($model,'estado'); ?>
                <?php echo CHtml::activeTextField($model,'estado',
                    array('class'=>'form-control input-sm')) ?>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::activeLabel($model,'pais'); ?>
                <?php echo CHtml::activeDropDownList(
                    $model,
                    'pais',
                    CHtml::listData(Pais::model()->findAll(), 'idpais', 'descpais'),
                    array('prompt'=>'Seleccione...',
                        'class'=>'form-control input-sm')
                ); ?>
            </div>
        </div>
    </fieldset>
    <br/>
    <fieldset>
        <legend>Campo de la mecánica de interés (Puede seleccionar más de uno)</legend>
        <div class="row">
            <div class="col-md-4">
                <?php echo CHtml::activeCheckBoxList($model,'campoint',
                    array(
                        '1'=>'Diseño mecánico',
                        '2'=>'Educación en ingeniería mecánica',
                        '3'=>'Manufactura y materiales',
                        '4'=>'Mecanica teórica',
                        '5'=>'Otras',
                        '6'=>'Termofluidos')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php echo CHtml::activeLabel($model,'areaespe'); ?>
                <?php echo CHtml::activeTextField($model,'areaespe',
                    array('class'=>'form-control input-sm')) ?>
            </div>
        </div>
    </fieldset>
    <br/>
    <div class="row">
        <div class="col-md-4">
            <?php echo CHtml::submitButton('Aceptar',
                array(
                'class' => 'btn btn-success',
                'id'=>'salva-miembro',
                'name'=>'salva-miembro',
                'confirm'=>'¿Esta seguro que desea modificar sus datos de contacto?',
            )); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
