<?php
/* @var $this ParticipantesController */
/* @var $data Participantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::encode($data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nac')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion')); ?>:</b>
	<?php echo CHtml::encode($data->institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel')); ?>:</b>
	<?php echo CHtml::encode($data->nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zona_id')); ?>:</b>
	<?php echo CHtml::encode($data->zona_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entrada')); ?>:</b>
	<?php echo CHtml::encode($data->entrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organizador_id')); ?>:</b>
	<?php echo CHtml::encode($data->organizador_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comida')); ?>:</b>
	<?php echo CHtml::encode($data->comida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seg_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->seg_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seg_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->seg_apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposito')); ?>:</b>
	<?php echo CHtml::encode($data->deposito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eliminado')); ?>:</b>
	<?php echo CHtml::encode($data->eliminado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo_id')); ?>:</b>
	<?php echo CHtml::encode($data->grupo_id); ?>
	<br />

	*/ ?>

</div>