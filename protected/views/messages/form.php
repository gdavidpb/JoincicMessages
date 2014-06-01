<?php
/* @var $this MessageController */
/* @var $model MessagesForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Messages';
$this->breadcrumbs=array(
	'Messages',
);

	Yii::app()->clientScript->registerCoreScript('jquery');

?>

<h1>Messages</h1>

<?php if(Yii::app()->user->hasFlash('messages')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('messages'); ?>
</div>

<?php else: ?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

		<div id="clock"></div>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'minuteCount'); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'rawNumbers'); ?>

		<?php if(!$model->tasking()): ?>
			<?php echo $form->textArea($model,'rawNumbers'); ?>
		<?php else: ?>
			<?php echo $form->hiddenField($model,'rawNumbers'); ?>
			<?php echo CHtml::encode($model->rawNumbers); ?></br>
		<?php endif; ?>

			<?php echo $form->error($model,'rawNumbers'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preffix'); ?>

	<?php if(!$model->tasking()): ?>
		<?php echo $form->textField($model,'preffix'); ?>
	<?php else: ?>
		<?php echo $form->hiddenField($model,'preffix'); ?>
		<?php echo CHtml::encode($model->preffix); ?></br>
	<?php endif; ?>

		<?php echo $form->error($model,'preffix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suffix'); ?>

	<?php if(!$model->tasking()): ?>
		<?php echo $form->textField($model,'suffix'); ?>
	<?php else: ?>
		<?php echo $form->hiddenField($model,'suffix'); ?>
		<?php echo CHtml::encode($model->suffix); ?></br>
	<?php endif; ?>

		<?php echo $form->error($model,'suffix'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>

	<?php if(!$model->tasking()): ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	<?php else: ?>
		<?php echo $form->hiddenField($model,'body'); ?>
		<?php echo CHtml::encode($model->body); ?></br>
	<?php endif; ?>

		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(!$model->tasking() && CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
			</div>
			<div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div></br>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php if($model->tasking()): ?>
			<input type="button" onClick="return cancel()" name="Cancel" value="Cancel">
		<?php endif; ?>
		<?php echo CHtml::submitButton(($model->tasking())?"Proximo":'Enviar'); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
	var tasking = <?php echo CJSON::encode($model->tasking()); ?>;
	var _cancel = false;
	var send_messages = function(){
			if(!_cancel)
				$("#messages-form").submit();
	};
	var cancel = function(){
		_cancel = true;
		return false;
	};
	var max_millisecs = 60000;
	var clock_monitor = 1000;
	var clock_to_next = function(){
		if(!_cancel){
			$("#clock").html("Faltan: "+(max_millisecs/clock_monitor));
			max_millisecs = max_millisecs - clock_monitor;
			setTimeout(clock_to_next,clock_monitor);
		}else{
			$("#clock").html("Cancelado");
		}
	};
	$(document).ready(function(){
		if(tasking){
			setTimeout(function(){
				send_messages();
			},max_millisecs);
			clock_to_next();
		}
	});

</script>

</div><!-- form -->
<?php endif; ?>


<?php 	foreach ($model->slice_models as $model) { ?>
<div class="flash-success">
			Mensaje enviado a :
			<?php if($model->attrNumber){ ?>
					<?php echo $model->telefono; ?> -
					<?php echo $model->nombre; ?>
					<?php echo $model->apellido; ?>
					C.I <?php echo $model->cedula; ?> </br>
			<?php }else{ ?>
				<b><?php echo $model; ?></b>
			<?php } ?>
</div>
<?php	} ?>
