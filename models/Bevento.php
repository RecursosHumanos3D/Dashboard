<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bevento".
 *
 * @property int $idevento
 * @property string $titulo
 * @property string $descripcion
 * @property string $fechaInicio
 * @property string $fechaTermino
 *
 * @property Basignacionesbeneficios[] $basignacionesbeneficios
 */
class Bevento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bevento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion'], 'required'],
            [['fechaInicio', 'fechaTermino'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idevento' => 'Idevento',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'fechaInicio' => 'Fecha Inicio',
            'fechaTermino' => 'Fecha Termino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasignacionesbeneficios()
    {
        return $this->hasMany(Basignacionesbeneficios::className(), ['idevento' => 'idevento']);
    }
}
