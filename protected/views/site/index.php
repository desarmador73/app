<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="row">
	<div class="col-md-12" role="main">
		<div class="bs-docs-section">
			<div class="bs-glyphicons">
				<ul class="bs-glyphicons-list">
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo CHtml::link($model->renderIcon('user', 'Actualizar datos'),
                            array('usuario/datosgral',
                                'param1'=>'value1')); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo CHtml::link($model->renderIcon('lock', 'Cambiar contraseña'),
                            array('usuario/password',
                                'param1'=>'value1')); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo $model->renderIcon('folder-open', 'Articulos'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo $model->renderIcon('briefcase', 'Registro al Congreso'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIconoTesorero(); ?>" >
                        <?php echo $model->renderIcon('usd', 'Tesorería'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIconoAdmin(); ?>" >
                        <?php echo $model->renderIcon('cog', 'Administrador'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIconoVisepres(); ?>" >
                        <?php echo $model->renderIcon('user', 'Viceperesidente'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo $model->renderIcon('cd', 'Difusión'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo $model->renderIcon('check', 'Evaluar articulos'); ?>
                    </span>
                    <span style="display: <?php echo $model->muestraIcono(); ?>" >
                        <?php echo $model->renderIcon('education', 'Constancias Árbitros'); ?>
                    </span>
					<span style="display: <?php echo $model->muestraIconoVotacion(); ?>" >
                        <?php echo CHtml::link($model->renderIcon('list-alt', 'Votaciones'),
                            array('votaciones/index',
                                'param1'=>'value1')); ?>
					</span>
				</ul><!-- bs-glyphicons-list -->
			</div>
		</div>
	</div>
</div><!-- row -->
