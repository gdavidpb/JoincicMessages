<?php
/* @var $this ParticipantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Participantes',
);

$this->menu=array(
	array('label'=>'Create Participantes', 'url'=>array('create')),
	array('label'=>'Manage Participantes', 'url'=>array('admin')),
);
?>

<h1>Participantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
