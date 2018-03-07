<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sucursal".
 *
 * @property int $idSucursal
 * @property string $nombreSucursal
 * @property int $rutEmpresa
 *
 * @property Colaborador[] $colaboradors
 */
class Sucursal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sucursal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutEmpresa'], 'required'],
            [['rutEmpresa'], 'integer'],
            [['nombreSucursal'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSucursal' => 'Id Sucursal',
            'nombreSucursal' => 'Nombre Sucursal',
            'rutEmpresa' => 'Rut Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['idSucursal' => 'idSucursal']);
    }
}
