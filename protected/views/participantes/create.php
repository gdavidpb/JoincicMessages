<?php
/* @var $this ParticipantesController */
/* @var $model Participantes */

$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Participantes', 'url'=>array('index')),
	array('label'=>'Manage Participantes', 'url'=>array('admin')),
);
?>

<h1>Create Participantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>