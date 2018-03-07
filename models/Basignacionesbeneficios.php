<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basignacionesbeneficios".
 *
 * @property int $bidAsignaciones
 * @property string $bFecha
 * @property int $bMonto
 * @property int $idDependencias
 * @property int $idevento
 *
 * @property Dependencia $dependencias
 * @property Bevento $evento
 */
class Basignacionesbeneficios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basignacionesbeneficios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bFecha'], 'safe'],
            [['bMonto', 'idDependencias', 'idevento'], 'integer'],
            [['idDependencias', 'idevento'], 'required'],
            [['idDependencias'], 'exist', 'skipOnError' => true, 'targetClass' => Dependencia::className(), 'targetAttribute' => ['idDependencias' => 'idDependencias']],
            [['idevento'], 'exist', 'skipOnError' => true, 'targetClass' => Bevento::className(), 'targetAttribute' => ['idevento' => 'idevento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bidAsignaciones' => 'Bid Asignaciones',
            'bFecha' => 'B Fecha',
            'bMonto' => 'B Monto',
            'idDependencias' => 'Id Dependencias',
            'idevento' => 'Idevento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasOne(Dependencia::className(), ['idDependencias' => 'idDependencias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvento()
    {
        return $this->hasOne(Bevento::className(), ['idevento' => 'idevento']);
    }
}
