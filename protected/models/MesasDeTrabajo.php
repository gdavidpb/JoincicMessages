<?php

/**
 * This is the model class for table "mesas_de_trabajo".
 *
 * The followings are the available columns in table 'mesas_de_trabajo':
 * @property integer $id
 * @property string $titulo
 * @property string $tema
 * @property string $descripcion
 * @property string $dia
 * @property string $hora_ini
 * @property string $hora_fin
 * @property string $lugar
 * @property integer $capacidad
 * @property string $requerimientos
 * @property integer $sorteada
 * @property integer $ponente_id
 * @property integer $patrocinante_id
 */
class MesasDeTrabajo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mesas_de_trabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, tema, descripcion, dia, hora_ini, hora_fin, lugar, capacidad, requerimientos', 'required'),
			array('capacidad, sorteada, ponente_id, patrocinante_id', 'numerical', 'integerOnly'=>true),
			array('titulo, descripcion', 'length', 'max'=>255),
			array('tema, lugar', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, tema, descripcion, dia, hora_ini, hora_fin, lugar, capacidad, requerimientos, sorteada, ponente_id, patrocinante_id', 'safe', 'on'=>'search'),
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
			'lugar' => 'Lugar',
			'capacidad' => 'Capacidad',
			'requerimientos' => 'Requerimientos',
			'sorteada' => 'Sorteada',
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
		$criteria->compare('lugar',$this->lugar,true);
		$criteria->compare('capacidad',$this->capacidad);
		$criteria->compare('requerimientos',$this->requerimientos,true);
		$criteria->compare('sorteada',$this->sorteada);
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
	 * @return MesasDeTrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
