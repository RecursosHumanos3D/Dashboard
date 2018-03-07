<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bcolaboradorbeneficio".
 *
 * @property int $idbcolBeneficio
 * @property string $bfechaCanje
 * @property int $bId_Beneficio
 * @property int $rutColaborador
 * @property string $bcomentarioBeneficio
 * @property int $bestadoBeneficio
 * @property double $bvalorCanje
 *
 * @property Bbeneficios $bIdBeneficio
 * @property Colaborador $rutColaborador0
 */
class Bcolaboradorbeneficio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcolaboradorbeneficio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bfechaCanje'], 'safe'],
            [['bId_Beneficio', 'rutColaborador'], 'required'],
            [['bId_Beneficio', 'rutColaborador', 'bestadoBeneficio'], 'integer'],
            [['bvalorCanje'], 'number'],
            [['bcomentarioBeneficio'], 'string', 'max' => 150],
            [['bId_Beneficio'], 'exist', 'skipOnError' => true, 'targetClass' => Bbeneficios::className(), 'targetAttribute' => ['bId_Beneficio' => 'bId_Beneficio']],
            [['rutColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['rutColaborador' => 'rutColaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idbcolBeneficio' => 'Idbcol Beneficio',
            'bfechaCanje' => 'Bfecha Canje',
            'bId_Beneficio' => 'B Id  Beneficio',
            'rutColaborador' => 'Rut Colaborador',
            'bcomentarioBeneficio' => 'Bcomentario Beneficio',
            'bestadoBeneficio' => 'Bestado Beneficio',
            'bvalorCanje' => 'Bvalor Canje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBIdBeneficio()
    {
        return $this->hasOne(Bbeneficios::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutColaborador0()
    {
        return $this->hasOne(Colaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
