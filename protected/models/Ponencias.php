<?php

/**
 * This is the model class for table "ponencias".
 *
 * The followings are the available columns in table 'ponencias':
 * @property integer $id
 * @property string $titulo
 * @property string $tema
 * @property string $descripcion
 * @property string $dia
 * @property string $hora_ini
 * @property string $hora_fin
 * @property string $requerimientos
 * @property integer $ponente_id
 * @property integer $patrocinante_id
 */
class Ponencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ponencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, tema, descripcion, dia, hora_ini, hora_fin, requerimientos, ponente_id', 'required'),
			array('ponente_id, patrocinante_id', 'numerical', 'integerOnly'=>true),
			array('titulo, descripcion', 'length', 'max'=>255),
			array('tema', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, tema, descripcion, dia, hora_ini, hora_fin, requerimientos, ponente_id, patrocinante_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'tema' => 'Tema',
			'descripcion' => 'Descripcion',
			'dia' => 'Dia',
			'hora_ini' => 'Hora Ini',
			'hora_fin' => 'Hora Fin',
			'requerimientos' => 'Requerimientos',
			'ponente_id' => 'Ponente',
			'patrocinante_id' => 'Patrocinante',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('tema',$this->tema,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('hora_ini',$this->hora_ini,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);
		$criteria->compare('requerimientos',$this->requerimientos,true);
		$criteria->compare('ponente_id',$this->ponente_id);
		$criteria->compare('patrocinante_id',$this->patrocinante_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ponencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
