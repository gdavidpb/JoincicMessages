<?php

/**
 * This is the model class for table "patrocinantes".
 *
 * The followings are the available columns in table 'patrocinantes':
 * @property integer $id
 * @property string $rif
 * @property string $nombre
 * @property integer $aporte
 * @property integer $plan_id
 * @property string $comentario
 * @property string $logo
 */
class Patrocinantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patrocinantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rif, nombre, aporte, plan_id', 'required'),
			array('aporte, plan_id', 'numerical', 'integerOnly'=>true),
			array('rif', 'length', 'max'=>12),
			array('nombre', 'length', 'max'=>30),
			array('comentario, logo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rif, nombre, aporte, plan_id, comentario, logo', 'safe', 'on'=>'search'),
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
			'rif' => 'Rif',
			'nombre' => 'Nombre',
			'aporte' => 'Aporte',
			'plan_id' => 'Plan',
			'comentario' => 'Comentario',
			'logo' => 'Logo',
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
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('aporte',$this->aporte);
		$criteria->compare('plan_id',$this->plan_id);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patrocinantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
