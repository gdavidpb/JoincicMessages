<?php
/* @var $this ParticipantesController */
/* @var $model Participantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'participantes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula'); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_nac'); ?>
		<?php echo $form->textField($model,'fecha_nac'); ?>
		<?php echo $form->error($model,'fecha_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion'); ?>
		<?php echo $form->textField($model,'institucion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivel'); ?>
		<?php echo $form->textField($model,'nivel'); ?>
		<?php echo $form->error($model,'nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_nivel'); ?>
		<?php echo $form->textField($model,'tipo_nivel',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'tipo_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zona_id'); ?>
		<?php echo $form->textField($model,'zona_id'); ?>
		<?php echo $form->error($model,'zona_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entrada'); ?>
		<?php echo $form->textField($model,'entrada'); ?>
		<?php echo $form->error($model,'entrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organizador_id'); ?>
		<?php echo $form->textField($model,'organizador_id'); ?>
		<?php echo $form->error($model,'organizador_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comida'); ?>
		<?php echo $form->textField($model,'comida'); ?>
		<?php echo $form->error($model,'comida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seg_nombre'); ?>
		<?php echo $form->textField($model,'seg_nombre',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'seg_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seg_apellido'); ?>
		<?php echo $form->textField($model,'seg_apellido',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'seg_apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deposito'); ?>
		<?php echo $form->textField($model,'deposito'); ?>
		<?php echo $form->error($model,'deposito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eliminado'); ?>
		<?php echo $form->textField($model,'eliminado'); ?>
		<?php echo $form->error($model,'eliminado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo_id'); ?>
		<?php echo $form->textField($model,'grupo_id'); ?>
		<?php echo $form->error($model,'grupo_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->