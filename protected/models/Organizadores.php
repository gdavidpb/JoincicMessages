<?php

/**
 * This is the model class for table "organizadores".
 *
 * The followings are the available columns in table 'organizadores':
 * @property integer $id
 * @property string $usuario
 * @property string $clave
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
 * @property string $coordinacion
 * @property integer $coordinador
 * @property string $seg_nombre
 * @property string $seg_apellido
 * @property integer $eliminado
 */
class Organizadores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organizadores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, clave, cedula, nombre, apellido, fecha_nac, telefono, correo, direccion, institucion, nivel, tipo_nivel, coordinacion', 'required'),
			array('cedula, nivel, coordinador, eliminado', 'numerical', 'integerOnly'=>true),
			array('usuario, clave, nombre, apellido, coordinacion, seg_nombre, seg_apellido', 'length', 'max'=>15),
			array('telefono', 'length', 'max'=>11),
			array('correo, direccion', 'length', 'max'=>50),
			array('institucion', 'length', 'max'=>7),
			array('tipo_nivel', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario, clave, cedula, nombre, apellido, fecha_nac, telefono, correo, direccion, institucion, nivel, tipo_nivel, coordinacion, coordinador, seg_nombre, seg_apellido, eliminado', 'safe', 'on'=>'search'),
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
			'usuario' => 'Usuario',
			'clave' => 'Clave',
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
			'coordinacion' => 'Coordinacion',
			'coordinador' => 'Coordinador',
			'seg_nombre' => 'Seg Nombre',
			'seg_apellido' => 'Seg Apellido',
			'eliminado' => 'Eliminado',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
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
		$criteria->compare('coordinacion',$this->coordinacion,true);
		$criteria->compare('coordinador',$this->coordinador);
		$criteria->compare('seg_nombre',$this->seg_nombre,true);
		$criteria->compare('seg_apellido',$this->seg_apellido,true);
		$criteria->compare('eliminado',$this->eliminado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Organizadores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
