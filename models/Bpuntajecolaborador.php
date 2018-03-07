<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bpuntajecolaborador".
 *
 * @property int $rutColaborador
 * @property double $puntaje
 * @property double $bolsa
 *
 * @property Colaborador $rutColaborador0
 */
class Bpuntajecolaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bpuntajecolaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador'], 'required'],
            [['rutColaborador'], 'integer'],
            [['puntaje', 'bolsa'], 'number'],
            [['rutColaborador'], 'unique'],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rutColaborador' => 'Rut Colaborador',
            'puntaje' => 'Puntaje',
            'bolsa' => 'Bolsa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
