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

	public function _certificado($tipo, $nombre, $cedula){
			$dirPath = "./certificados/";
			Yii::import("imageWorkshop.ImageWorkshopComponent", true);
			$filename = str_replace(" ", "_", "$tipo $nombre $cedula $tipo.png");			
			$filename = stripAccents($filename);
			if(!file_exists($dirPath.$filename) || filemtime($dirPath.$filename) + 300 < time() ){
					$carnet = ImageWorkshop::initVirginLayer(1600, 1236); // width: 300px, height: 200px
					$background_layer = ImageWorkshop::initFromPath('./certificado.png');
					$fontPath = './arialbd.ttf';
					$fontBig = 30;
					$fontMiddle = 20;
					$fontSmall = 14;
					$fontColor = "696967";
					$textRotation = 0;
					if($nombre)
						$nombre_layer = ImageWorkshop::initTextLayer($nombre, $fontPath, $fontBig, $fontColor, $textRotation);
					if($tipo)
						$tipo_layer = ImageWorkshop::initTextLayer($tipo, $fontPath, $fontBig, $fontColor, $textRotation); 			 
					$carnet->addLayer(0, $background_layer, 0, 0, "LT");
					if($nombre)
						$carnet->addLayer(1, $nombre_layer, 0, -150, "MM");
					if($tipo)
						$carnet->addLayer(1, $tipo_layer, 0, 50, "MM");
					$createFolders = true;
					$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
					$imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%) 
					$carnet->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
			}
			return $dirPath.$filename;
	}

	public function _carnet($tipo, $nombre, $numero, $cedula, $info , $file = './carnet.png', $font = './ARLRDBD.TTF', $moveTop= 0 , $fontColor = "000000"){

			Yii::import("imageWorkshop.ImageWorkshopComponent", true);
			$dirPath = "./carnets/";	

			$filename = str_replace(" ", "_", "$tipo $nombre $numero $cedula $info.png");	
			$filename = stripAccents($filename);
			if(!file_exists($dirPath.$filename) || filemtime($dirPath.$filename) + 300 < time() ){
					$carnet = ImageWorkshop::initVirginLayer(600, 417); // width: 300px, height: 200px
					$background_layer = ImageWorkshop::initFromPath($file);
					$fontPath = $font;
					$fontXBig = 35;
					$fontBig = 25;
					$fontMiddle = 20;
					$fontSmall = 14;
					$fontColor = $fontColor;
					$textRotation = 0;

					if($tipo)
						$tipo_layer = ImageWorkshop::initTextLayer($tipo, $fontPath, $fontXBig, $fontColor, $textRotation);
					if($nombre)
						$nombre_layer = ImageWorkshop::initTextLayer($nombre, $fontPath, $fontBig, $fontColor, $textRotation);
					if($cedula)
						$cedula_layer = ImageWorkshop::initTextLayer($cedula, $fontPath, $fontMiddle, $fontColor, $textRotation);
					if($numero)
						$numero_layer = ImageWorkshop::initTextLayer($numero, $fontPath, $fontSmall, $fontColor, $textRotation);
					if($info)
						$info_layer  = ImageWorkshop::initTextLayer($info, $fontPath, $fontSmall, $fontColor, $textRotation); 			 
					$carnet->addLayer(0, $background_layer, 0, 0, "LT");
					if($tipo)
						$carnet->addLayer(1, $tipo_layer, 0, 5+$moveTop, "MM");
					if($nombre)
						$carnet->addLayer(1, $nombre_layer, 0, 60+$moveTop, "MM");
					if($cedula)
						$carnet->addLayer(2, $cedula_layer, 0, 85+$moveTop, "MM");
					if($numero)
						$carnet->addLayer(3, $numero_layer, 0, 120+$moveTop, "MM");
					if($info)
						$carnet->addLayer(4, $info_layer, 240, 120+$moveTop, "MM");
					$createFolders = true;
					$backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
					$imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%) 
					$carnet->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
			}
			return $dirPath.$filename;
	}


	public function certificado($participante){
			$nombre = $participante->nombre.' '.$participante->apellido;
			$numero = "Nro ".$participante->entrada;
			$cedula = number_format($participante->cedula , 0, ',', '.');
			$info = ($participante->zona_id==2)? "VIP" : 'General';
			return $this->_certificado( "Participante", $nombre, $cedula);
	}
	public function carnet($participante){
			$nombre = $participante->nombre.' '.$participante->apellido;
			$numero = "Nro ".$participante->entrada;
			$cedula = number_format($participante->cedula , 0, ',', '.');
			$info = ($participante->zona_id==2)? "VIP" : 'General';

			return $this->_carnet( "", $nombre, $numero, $cedula, $info, "./carnet_participante.png", "./arialbd.ttf", -15 , "000000");
	}

	public function carnetOrganizador($organizador){

			$tipo = "";
			if($organizador->coordinador)
				$tipo .="Coordinador ";
			$tipo .= $organizador->coordinacion;

			$info = "";
			$nombre =  $organizador->nombre. " ".$organizador->apellido;
			$cedula = false;
			$numero = false;
			$filename = str_replace(" ", "_", "$tipo $nombre $cedula.png");
			return $this->_carnet($tipo, $nombre, $numero, $cedula, $info, "./carnet_organizador.png", "./arialbd.ttf", 20 , "FFFFFF");
	}

	public function certificadoOrganizador($organizador){
			$tipo = "";
			if($organizador->coordinador)
				$tipo .="Coordinador ";
			$tipo .= $organizador->coordinacion;

			$tipo .=" ".$organizador->institucion;
			$nombre =  $organizador->nombre. " ".$organizador->apellido;
			$cedula = false;

			$filename = str_replace(" ", "_", "$tipo $nombre $cedula.png");

			return  $this->_certificado($tipo, $nombre, $cedula);
	}

	public function actionCarnetOrganizador($email)
	{

			$organizador = Organizadores::model()->find("correo=:email",array(
				':email' => $email
			));

			$tipo = "";
			if($organizador->coordinador)
				$tipo .="Coordinador ";
			$tipo .= $organizador->coordinacion;

			$info = "";
			$nombre =  $organizador->nombre. " ".$organizador->apellido;
			$cedula = false;
			$numero = false;
			$filename = str_replace(" ", "_", "$tipo $nombre $cedula.png");
			$filepath = $this->carnetOrganizador($organizador);
			if(isset($_REQUEST['download'])){
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
			}else{
				header('Content-type: image/png');
			}
			header('Content-Disposition: filename="'.$filename.'"');
			readfile($filepath);
	}




	public function actionCertificadoOrganizador($email)
	{

			$organizador = Organizadores::model()->find("correo=:email",array(
				':email' => $email
			));

			$tipo = "";
			if($organizador->coordinador)
				$tipo .="Coordinador ";
			$tipo .= $organizador->coordinacion;

			$tipo .=" ".$organizador->institucion;
			$nombre =  $organizador->nombre. " ".$organizador->apellido;
			$cedula = false;

			$filename = str_replace(" ", "_", "$tipo $nombre $cedula.png");
			$filepath = $this->certificadoOrganizador($organizador);
			if(isset($_REQUEST['download'])){
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
			}else{
				header('Content-type: image/png');
			}
			header('Content-Disposition: filename="'.$filename.'"');
			readfile($filepath);
	}


	public function actionCertificado($cedula)
	{

			$participante = Participantes::model()->find("cedula=:cedula",array(
				':cedula' => $cedula
			));

			$nombre = $participante->nombre.' '.$participante->apellido;
			$numero = $participante->entrada;
			$cedula = number_format($participante->cedula , 0, ',', '.');
			$info = ($participante->zona_id==2)? "VIP" : 'General';

			$filename = str_replace(" ", "_", "$nombre $numero $cedula $info.png");
			$filepath = $this->certificado($participante);
			if(isset($_REQUEST['download'])){
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
			}else{
				header('Content-type: image/png');
			}
			header('Content-Disposition: filename="'.$filename.'"');
			readfile($filepath);
	}

	public function actionCarnet($cedula)
	{
		Yii::import("imageWorkshop.ImageWorkshopComponent", true);


			$participante = Participantes::model()->find("cedula=:cedula",array(
				':cedula' => $cedula
			));

			$nombre = $participante->nombre.' '.$participante->apellido;
			$numero = $participante->entrada;
			$cedula = number_format($participante->cedula , 0, ',', '.');
			$info = ($participante->zona_id==2)? "VIP" : 'General';

			$filename = str_replace(" ", "_", "$nombre $numero $cedula $info.png");

			$filepath = $this->carnet($participante);

			if(isset($_REQUEST['download'])){
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
			}else{
				header('Content-type: image/png');
			}
			header('Content-Disposition: filename="'.$filename.'"');
			readfile($filepath);
	}



	public function actionZipParticipantes(){

		$filename = "Participantes.zip";
	    if(file_exists($filename)){
	        header("location: /$filename");
	        exit;
	    }
    

		$participantes = Participantes::model()->findAll();
		$files = [];
		foreach ($participantes as $participante) {
			$files []= $this->certificado($participante);
			$files []= $this->carnet($participante);
		}
		zipFilesAndDownload($files,$filename);
	}

	public function actionZipOrganizadores(){
		$filename = "Organizadores.zip";
	    if(file_exists($filename)){
	        header("location: /$filename");
	        exit;
	    }
    
		$Organizadores = Organizadores::model()->findAll();
		$files = [];
		foreach ($Organizadores as $model) {
			$files []= $this->certificadoOrganizador($model);
			$files []= $this->carnetOrganizador($model);
		}
		zipFilesAndDownload($files,$filename);
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
