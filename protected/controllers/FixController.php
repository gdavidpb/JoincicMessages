<?php

class FixController extends Controller
{
//http://messages.joincic.com.ve/byCedulas?no_validate&cedulas[]=19222155&body=hola

	public function actionFixParticipantes(){


		function  utf_ascii($cadena){
				$utf_minusculas = array(
					'\xc3\xa1'=>'á',
					'\xc3\xa9'=>'é',
					'\xc3\xad'=>'í',
					'\xc3\xb3'=>'ó', 
					'\xc3\xba'=>'ú',
					'\xc3\xb1'=>'ñ',
					'\xC3\xA1'=>'á',
					'\xC3\xA9'=>'é',
					'\xC3\xAD'=>'í',
					'\xC3\xB3'=>'ó', 
					'\xC3\xBA'=>'ú',
					'\xC3\xB1'=>'ñ'
				);
				$utf_mayusculas = array(
					'\xc3\x81'=>'Á',
					'\xc3\x89'=>'É',
					'\xc3\x8d'=>'Í',
					'\xc3\x93'=>'Ó', 
					'\xc3\x9a'=>'Ú',
					'\xc3\x91'=>'Ñ',
					'\xC3\x81'=>'Á',
					'\xC3\x89'=>'É',
					'\xC3\x8d'=>'Í',
					'\xC3\x93'=>'Ó', 
					'\xC3\x9a'=>'Ú',
					'\xC3\x91'=>'Ñ'
				);
				$cadena = strtr($cadena,$utf_minusculas);
				$cadena = strtr($cadena,$utf_mayusculas);
				return $cadena;
		}
		$particpantes = Participantes::model()->findAll();

		foreach ($particpantes as $model) {

			echo " - ".$model->cedula;
			echo $model->intereses = utf_ascii($model->intereses);
			echo " - ";
			echo $model->experiencia = utf_ascii($model->experiencia);
			$model->save();
			echo CHtml::errorSummary($model);
			echo "<br/>";
		}

			echo "finish";
	}

}