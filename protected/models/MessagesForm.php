<?php

/**
 * MessagesForm class.
 * MessagesForm is the data structure for keeping
 */
class MessagesForm extends CFormModel
{


	public $body;

	public $suffix;
	
	public $preffix;
	
	public $models = array();

	public $log;

	public $messagesPerMinute = 1;
	public $minuteCount = 0;

	public $verifyCode;
	
	public $control = false;
	public $slice_models = array();

	public $attrNumber = 'telefono';

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('body', 'required'),
			array('body', 'length', 'max'=>140),
			array('body, suffix, preffix, models, log, minuteCount, messagesPerMinute', 'safe'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>( !isset($_REQUEST['no_validate']) || !CCaptcha::checkRequirements() || !(count($this->models)>0 && $this->tasking()) ) , 'on'=> 'send'),
		);
	}
	public function tasking(){
		return $this->control && $this->minuteCount*$this->messagesPerMinute < count($this->models); 
	}
	public function send(){
		if(!is_array($this->models) || !$this->tasking() ) return false;
		$models = $this->models;
		$count = $this->minuteCount;
		$messagesPerMinute = $this->messagesPerMinute;
		if($messagesPerMinute>0){
			$slice_models = array_slice($models, $count*$messagesPerMinute, $messagesPerMinute);
			$this->slice_models = $slice_models;
		}
		$this->minuteCount=$this->minuteCount+1;
		$attrNumber = $this->attrNumber;
		
		
		$sms = new Textveloper();
		$parameters = array();
		$parameters['cuenta_token'] = Yii::app()->params['cuenta_token'];
		$parameters['subcuenta_token'] = Yii::app()->params['subcuenta_token'];
		$parameters['mensaje'] = $this->preffix.$this->body.$this->suffix;
		foreach ($slice_models as $model) {
			if($attrNumber==false)
				$parameters['telefono'] = $model;
			else
				$parameters['telefono'] = $model->$attrNumber;
			$this->log.= $sms->enviar($parameters);
		}
		
		return $this->log;		
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}

}