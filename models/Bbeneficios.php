<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbeneficios".
 *
 * @property int $bId_Beneficio
 * @property string $bNombre
 * @property string $bDescripcion
 * @property string $bTipoBeneficio
 * @property double $bValorBeneficio
 * @property double $bvezporanio
 * @property double $bvezpormes
 * @property string $bimagen
 *
 * @property Bcolaboradorbeneficio[] $bcolaboradorbeneficios
 * @property Bdetallebeneficio[] $bdetallebeneficios
 */
class Bbeneficios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'bbeneficios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bValorBeneficio', 'bvezporanio', 'bvezpormes'], 'number'],
            [['bNombre'], 'string', 'max' => 100],
            [['bDescripcion'], 'string', 'max' => 200],
            [['bTipoBeneficio'], 'string', 'max' => 45],
            [['bimagen'], 'file'],
            [['file'], 'file', 'maxSize' => 812000, 'tooBig' => 'excede el limite, 8 MB Aprox', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bId_Beneficio' => 'ID',
            'bNombre' => 'Nombre del Beneficio',
            'bDescripcion' => 'Descripción',
            'bTipoBeneficio' => 'Tipo de Beneficio',
            'bValorBeneficio' => 'Valor del Beneficio',
            'bvezporanio' => 'Veces por Año',
            'bvezpormes' => 'Veces por Mes',
            'bimagen' => 'Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcolaboradorbeneficios()
    {
        return $this->hasMany(Bcolaboradorbeneficio::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBdetallebeneficios()
    {
        return $this->hasMany(Bdetallebeneficio::className(), ['bId_Beneficio' => 'bId_Beneficio']);
    }
}
