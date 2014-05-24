<?php

/**
 * This is the model class for table "participantes".
 *
 * The followings are the available columns in table 'participantes':
 * @property integer $id
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nac
 * @property string $telefono
 * @property string $correo
 * @property string $direccion
 * @property string $institucion
 * @property integer $nivel
 * @property string $tipo_nivel
 * @property integer $zona_id
 * @property integer $entrada
 * @property integer $organizador_id
 * @property integer $comida
 * @property string $created_at
 * @property string $seg_nombre
 * @property string $seg_apellido
 * @property integer $deposito
 * @property integer $eliminado
 * @property integer $grupo_id
 */
class Participantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'participantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, nombre, apellido, fecha_nac, telefono, correo, direccion, institucion, nivel, tipo_nivel, zona_id, entrada, organizador_id, created_at', 'required'),
			array('cedula, nivel, zona_id, entrada, organizador_id, comida, deposito, eliminado, grupo_id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, seg_nombre, seg_apellido', 'length', 'max'=>15),
			array('telefono', 'length', 'max'=>11),
			array('correo, direccion', 'length', 'max'=>50),
			array('institucion', 'length', 'max'=>20),
			array('tipo_nivel', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cedula, nombre, apellido, fecha_nac, telefono, correo, direccion, institucion, nivel, tipo_nivel, zona_id, entrada, organizador_id, comida, created_at, seg_nombre, seg_apellido, deposito, eliminado, grupo_id', 'safe', 'on'=>'search'),
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
			'cedula' => 'Cedula',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'fecha_nac' => 'Fecha Nac',
			'telefono' => 'Telefono',
			'correo' => 'Correo',
			'direccion' => 'Direccion',
			'institucion' => 'Institucion',
			'nivel' => 'Nivel',
			'tipo_nivel' => 'Tipo Nivel',
			'zona_id' => 'Zona',
			'entrada' => 'Entrada',
			'organizador_id' => 'Organizador',
			'comida' => 'Comida',
			'created_at' => 'Created At',
			'seg_nombre' => 'Seg Nombre',
			'seg_apellido' => 'Seg Apellido',
			'deposito' => 'Deposito',
			'eliminado' => 'Eliminado',
			'grupo_id' => 'Grupo',
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
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('tipo_nivel',$this->tipo_nivel,true);
		$criteria->compare('zona_id',$this->zona_id);
		$criteria->compare('entrada',$this->entrada);
		$criteria->compare('organizador_id',$this->organizador_id);
		$criteria->compare('comida',$this->comida);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('seg_nombre',$this->seg_nombre,true);
		$criteria->compare('seg_apellido',$this->seg_apellido,true);
		$criteria->compare('deposito',$this->deposito);
		$criteria->compare('eliminado',$this->eliminado);
		$criteria->compare('grupo_id',$this->grupo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Participantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
