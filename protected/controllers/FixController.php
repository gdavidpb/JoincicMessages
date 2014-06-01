<?php

class FixController extends Controller
{
//http://messages.joincic.com.ve/byCedulas?no_validate&cedulas[]=19222155&body=hola

	public function actionFixParticipantes(){


		function  aHtml($cadena){
				$minusculas = array(
					'á'=>'&aacute;',
					'é'=>'&eacute;',
					'í'=>'&iacute;',
					'ó'=>'&oacute;', 
					'ú'=>'&uacute;',
					'ñ'=>'&ntilde;'
				);
				$mayusculas = array(
					'Á'=>'&Aacute;',
					'É'=>'&Eacute;',
					'Í'=>'&Iacute;',
					'Ó'=>'&Oacute;', 
					'Ú'=>'&Uacute;',
					'Ñ'=>'&Ntilde;'
				);


				$utf_minusculas = array(
					'\xc3\xa1'=>'&aacute;',
					'\xc3\xa9'=>'&eacute;',
					'\xc3\xad'=>'&iacute;',
					'\xc3\xb3'=>'&oacute;', 
					'\xc3\xba'=>'&uacute;',
					'\xc3\xb1'=>'&ntilde;',
					'\xC3\xA1'=>'&aacute;',
					'\xC3\xA9'=>'&eacute;',
					'\xC3\xAD'=>'&iacute;',
					'\xC3\xB3'=>'&oacute;', 
					'\xC3\xBA'=>'&uacute;',
					'\xC3\xB1'=>'&ntilde;'
				);

				$utf_mayusculas = array(
					'\xc3\x81'=>'&Aacute;',
					'\xc3\x89'=>'&Eacute;',
					'\xc3\x8d'=>'&Iacute;',
					'\xc3\x93'=>'&Oacute;', 
					'\xc3\x9a'=>'&Uacute;',
					'\xc3\x91'=>'&Ntilde;',
					'\xC3\x81'=>'&Aacute;',
					'\xC3\x89'=>'&Eacute;',
					'\xC3\x8d'=>'&Iacute;',
					'\xC3\x93'=>'&Oacute;', 
					'\xC3\x9a'=>'&Uacute;',
					'\xC3\x91'=>'&Ntilde;'
				);

				$cadena = strtr($cadena,$minusculas);
				$cadena = strtr($cadena,$mayusculas);
				$cadena = strtr($cadena,$utf_minusculas);
				$cadena = strtr($cadena,$utf_mayusculas);
				return $cadena;
		}
		$particpantes = Participantes::model()->findAll();
		echo aHtml("Dise\xC3\xB1o de interfaces");
		exit();

		foreach ($particpantes as $model) {
			$model->intereses = aHtml($model->intereses);
			$model->experiencia = aHtml($model->experiencia);
			$model->save();
			echo Chtml::errorSummary($model);
			var_dump($model->attributes);
			echo "<br/>";
		}

			echo "finish";
	}

}