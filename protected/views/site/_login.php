<?php if(!isset($loginForm)) $loginForm= new LoginForm(); ?>
<div class="form row-fluid">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'action' => Html::normalizeUrl(array('/site/login')),
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
			<div class="row-fluid">
				<div  class="row-fluid">
					<b><?php echo CHtml::encode($loginForm->getAttributeLabel('username')); ?>:</b>
				</div>
				<div  class="row-fluid">
					<?php echo $form->textField($loginForm,'username',array('class'=>'span12')); ?>
					<?php echo $form->error($loginForm,'username'); ?>
				</div>
			</div>

			<div class="row-fluid">
				<div  class="row-fluid">
					<b><?php echo CHtml::encode($loginForm->getAttributeLabel('password')); ?>:</b>
				</div>
				<div  class="row-fluid">
					<?php echo $form->passwordField($loginForm,'password',array('class'=>'span12')); ?>
					<?php echo $form->error($loginForm,'password'); ?>
				</div>
			</div>


			<div class="row-fluid buttons">
				<?php echo CHtml::submitButton(Yii::t('user','Submit'),array('class'=>'btn span12')); ?>
			</div>

		<?php $this->endWidget(); ?>
	</div><!-- form -->