<?php
use PHPImageWorkshop\ImageWorkshop;

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	public function actionCarnet($cedula)
	{
		Yii::import("imageWorkshop.ImageWorkshopComponent", true);

			$dirPath = "./carnets/";

			$participante = Participantes::model()->find("cedula=:cedula",array(
				':cedula' => $cedula
			));

			$nombre = $participante->nombre.' '.$participante->apellido;
			$numero = $participante->entrada;
			$cedula = $participante->cedula;
			$info = ($participante->zona_id==2)? "VIP" : 'General';

			$filename = "$nombre$numero$cedula$info .png";
			if(!file_exists($dirPath.$filename)){

					$carnet = ImageWorkshop::initVirginLayer(600, 417); // width: 300px, height: 200px

					$background_layer = ImageWorkshop::initFromPath('./carnet.png');



					$fontPath = './HelveticaNeueBold.ttf';
					$fontBig = 25;
					$fontMiddle = 20;
					$fontSmall = 14;
					$fontColor = "000000";
					$textRotation = 0;

					$nombre_layer = ImageWorkshop::initTextLayer($nombre, $fontPath, $fontBig, $fontColor, $textRotation);
					$cedula_layer = ImageWorkshop::initTextLayer($cedula, $fontPath, $fontMiddle, $fontColor, $textRotation);
					$numero_layer = ImageWorkshop::initTextLayer("Nro ".$numero, $fontPath, $fontSmall, $fontColor, $textRotation);
					$info_layer  = ImageWorkshop::initTextLayer($info, $fontPath, $fontSmall, $fontColor, $textRotation);
			 
			 
					$carnet->addLayer(0, $background_layer, 0, 0, "LT");
					$carnet->addLayer(1, $nombre_layer, 0, 60, "MM");
					$carnet->addLayer(2, $cedula_layer, 0, 85, "MM");
					$carnet->addLayer(3, $numero_layer, 0, 120, "MM");
					$carnet->addLayer(4, $info_layer, 240, 120, "MM");


					$createFolders = true;
					$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
					$imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%) 
					$carnet->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);


			}

			header('Content-type: image/png');
			header('Content-Disposition: filename="'.$filename.'.png"');

			readfile($dirPath.$filename);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionFixls()
	{
		function  aHtml($cadena){
				$minusculas = array ('á'=>'&aacute;','é'=>'&eacute;','í'=>'&iacute;','ó'=>'&oacute;', 'ú'=>'&uacute;','ñ'=>'&ntilde;');
				$mayusculas = array ('Á'=>'&Aacute;','É'=>'&Eacute;','Í'=>'&Iacute;','Ó'=>'&Oacute;', 'Ú'=>'&Uacute;','Ñ'=>'&Ntilde;');
				$cadena = strtr($cadena,$minusculas);
				$cadena = strtr($cadena,$mayusculas);
				return $cadena;
		}
		if(isset($_FILES["upload_file"])){
			$fileContent = file_get_contents($_FILES['upload_file']['tmp_name']);
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-Disposition: attachment; filename=".$_FILES["upload_file"]["name"]);  //File name extension was wrong
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false);
			echo aHtml($fileContent);
			Yii::app()->end();
			exit();
		}
		$this->render('fixls');

	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
