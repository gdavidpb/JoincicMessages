<?php
/* @var $this ParticipantesController */
/* @var $model Participantes */

$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Participantes', 'url'=>array('index')),
	array('label'=>'Create Participantes', 'url'=>array('create')),
	array('label'=>'Update Participantes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Participantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Participantes', 'url'=>array('admin')),
);
?>

<h1>View Participantes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cedula',
		'nombre',
		'apellido',
		'fecha_nac',
		'telefono',
		'correo',
		'direccion',
		'institucion',
		'nivel',
		'tipo_nivel',
		'zona_id',
		'entrada',
		'organizador_id',
		'comida',
		'created_at',
		'seg_nombre',
		'seg_apellido',
		'deposito',
		'eliminado',
		'grupo_id',
	),
)); ?>
