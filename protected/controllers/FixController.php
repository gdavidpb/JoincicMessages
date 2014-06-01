<?php

class FixController extends Controller
{
//http://messages.joincic.com.ve/byCedulas?no_validate&cedulas[]=19222155&body=hola

	public actionFixParticipantes(){


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
					'\xc3\xb1'=>'&ntilde;'
				);
				$utf_mayusculas = array(
					'\xc3\x81'=>'&Aacute;',
					'\xc3\x89'=>'&Eacute;',
					'\xc3\x8d'=>'&Iacute;',
					'\xc3\x93'=>'&Oacute;', 
					'\xc3\x9a'=>'&Uacute;',
					'\xc3\x91'=>'&Ntilde;'
				);

				$cadena = strtr($cadena,$minusculas);
				$cadena = strtr($cadena,$mayusculas);
				$cadena = strtr($cadena,$utf_minusculas);
				$cadena = strtr($cadena,$utf_mayusculas);
				return $cadena;
		}
		$particpantes = Participantes::model()->findAll();


		foreach ($particpantes as $model) {
			$model->intereses = aHtml($model->intereses);
			$model->experiencia = aHtml($model->experiencia);
			$model->save();
		}
	}

}