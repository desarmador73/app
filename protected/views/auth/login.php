<?php
/* @var $this AuthController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array(
        'class'=>'form-signin'
    )
)); ?>
	
	<h2 class="form-signin-heading">Ingreso a SOMIM</h2>

	<?php echo $form->error($model,'password'); ?>

	
	<?php echo $form->labelEx($model,'username', array('class'=>'sr-only')); ?>
	<?php echo $form->textField($model,'username',
        array(
            'class'=>'form-control',
            'placeholder'=>'Dirección de correo electrónico',
            )); ?>
	<?php echo $form->error($model,'username'); ?>


	<?php echo $form->labelEx($model,'password', array('class'=>'sr-only')); ?>
	<?php echo $form->passwordField($model,'password',
        array(
            'class'=>'form-control',
            'placeholder'=>'Contraseña',
            )); ?>
	

	<div class="checkbox">
        <label>
		    <?php echo $form->checkBox($model,'rememberMe'); ?> Recordarme por 30 dias
        </label>
	</div>

	<?php echo CHtml::submitButton('Aceptar',
        array('class'=>'btn btn-lg btn-primary btn-block')); ?>

	<div style="margin-top: 10px">
        <?php echo CHtml::link('¿Olvidó su contraseña?', array('usuario/restaurar',
            'param1'=>'value1')); ?>
	</div>
	<div style="margin-top: 10px">
        <?php echo CHtml::link('¿Es nuevo en SOMIM? Registrese aqui.', array('usuario/nuevo',
            'param1'=>'value1')); ?>
	</div>
<?php $this->endWidget(); ?>
