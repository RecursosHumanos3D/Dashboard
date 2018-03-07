<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dependencia".
 *
 * @property int $idDependencias
 * @property int $rutColaborador1
 * @property int $rutColaborador2
 *
 * @property Basignacionesbeneficios[] $basignacionesbeneficios
 * @property Bhistorialpuntaje[] $bhistorialpuntajes
 * @property Colaborador $rutColaborador10
 * @property Colaborador $rutColaborador20
 */
class Dependencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dependencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador1', 'rutColaborador2'], 'required'],
            [['rutColaborador1', 'rutColaborador2'], 'integer'],
            [['rutColaborador1'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador1' => 'rutColaborador']],
            [['rutColaborador2'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador2' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDependencias' => 'Id Dependencias',
            'rutColaborador1' => 'Rut Colaborador1',
            'rutColaborador2' => 'Rut Colaborador2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasignacionesbeneficios()
    {
        return $this->hasMany(Basignacionesbeneficios::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBhistorialpuntajes()
    {
        return $this->hasMany(Bhistorialpuntaje::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador10()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador20()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador2']);
    }
}
