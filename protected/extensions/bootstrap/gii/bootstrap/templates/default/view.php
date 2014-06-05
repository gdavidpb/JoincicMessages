<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
array('label'=>Yii::t('<?php echo $this->modelClass; ?>',List <?php echo $this->modelClass; ?>'),'url'=>array('index')),
array('label'=>Yii::t('<?php echo $this->modelClass; ?>','Create <?php echo $this->modelClass; ?>'),'url'=>array('create')),
array('label'=>Yii::t('<?php echo $this->modelClass; ?>','Update <?php echo $this->modelClass; ?>'),'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
array('label'=>Yii::t('<?php echo $this->modelClass; ?>','Delete <?php echo $this->modelClass; ?>'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t('<?php echo $this->modelClass; ?>', 'Are you sure you want to delete this item?'))),

array('label'=>Yii::t('<?php echo $this->modelClass; ?>','Manage <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<h1><?php echo "<?php"; ?> Yii::t('<?php echo $this->modelClass; ?>', "View <?php echo $this->modelClass; ?> #{ID}", array('{ID}'=><?php echo "\$model->{$this->tableSchema->primaryKey}"; ?>)); ?> </h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
	echo "\t\t'" . $column->name . "',\n";
}
?>
),
)); ?>
