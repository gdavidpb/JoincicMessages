<?php

class Html extends CHtml{

	/**
	 * The script is rendered in the head section right before the title element.
	 */
	const POS_HEAD=0;
	/**
	 * The script is rendered at the beginning of the body section.
	 */
	const POS_BEGIN=1;
	/**
	 * The script is rendered at the end of the body section.
	 */
	const POS_END=2;
	/**
	 * The script is rendered inside window onload function.
	 */
	const POS_LOAD=3;
	/**
	 * The body script is rendered inside a jQuery ready function.
	 */
	const POS_READY=4;

	public static function iframe($name,$src,$htmlOptions=array())
	{
		$htmlOptions['src']=$src;
		$htmlOptions['name']=$name;
		if(!isset($htmlOptions['id']))
			$htmlOptions['id']=self::getIdByName($name);
		elseif($htmlOptions['id']===false)
			unset($htmlOptions['id']);
		return self::tag('iframe',$htmlOptions,"");
	}

	public static function beginCapture(){
		ob_start(); 
	}

	public static function endCapture(){
		$content = ob_get_clean();
		return $content;
	}

	public static function sanitize($html){
		$banned = '<script><style><link>';
		if(isset(Yii::app()->params["bannedTags"])){
			$banned = Yii::app()->params["bannedTags"];
		}
		return strip_tags_content($html,$banned,TRUE);
	}

	
	public static function registerScriptCapture($name,$position=0){

		$content = ob_get_clean();
		$content = str_replace('<script>', '', $content);
		$content = str_replace('</script>', '', $content);


		Yii::app()->clientScript->registerScript($name,$content,$position);
	}
}