<?php

/**
 * This is the model class for table "premios".
 *
 * The followings are the available columns in table 'premios':
 * @property integer $id
 * @property string $nombre
 * @property integer $rifa_id
 * @property integer $participante_id
 * @property integer $patrocinante_id
 */
class Premios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'premios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, rifa_id', 'required'),
			array('rifa_id, participante_id, patrocinante_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, rifa_id, participante_id, patrocinante_id', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'rifa_id' => 'Rifa',
			'participante_id' => 'Participante',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('rifa_id',$this->rifa_id);
		$criteria->compare('participante_id',$this->participante_id);
		$criteria->compare('patrocinante_id',$this->patrocinante_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Premios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
