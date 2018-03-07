<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colaborador".
 *
 * @property int $rutColaborador
 * @property string $dvColaborador
 * @property string $pass
 * @property string $nombreColaborador
 * @property string $apellidosColaborador
 * @property int $idSucursal
 * @property int $idArea
 * @property int $idCargo
 * @property int $idRol
 * @property int $idGerencia
 * @property int $westadoJefe
 * @property int $idperfil
 * @property int $idperfilRed
 * @property int $idestadisticas
 * @property int $idestado
 * @property int $idCC
 * @property string $correo
 * @property string $telefono
 * @property string $direccion
 * @property string $pais
 *
 * @property Bcolaboradorbeneficio[] $bcolaboradorbeneficios
 * @property Bpuntajecolaborador $bpuntajecolaborador
 * @property Area $area
 * @property Cargos $cargo
 * @property Icentrocosto $cC
 * @property Estadocolaborador $estado
 * @property Gerencia $gerencia
 * @property Perfil $perfil
 * @property Restadisticas $estadisticas
 * @property Rol $rol
 * @property Rperfilredsocial $perfilRed
 * @property Sucursal $sucursal
 * @property Ddependencias[] $ddependencias
 * @property Ddependencias[] $ddependencias0
 * @property Dependencia[] $dependencias
 * @property Dependencia[] $dependencias0
 * @property Historialcolaborador[] $historialcolaboradors
 * @property Icontactabilidad[] $icontactabilidads
 * @property IdetalleLchUsuario[] $etalleLchUsuarios
 * @property Idetalleinduccion[] $etalleinduccions
 * @property Idjmanual[] $jmanuals
 * @property IllamadasRealizadas[] $illamadasRealizadas
 * @property Iprogreso[] $iprogresos
 */
class Colaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rutColaborador', 'dvColaborador', 'pass', 'nombreColaborador', 'apellidosColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC', 'correo'], 'required'],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'westadoJefe', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'integer'],
            [['dvColaborador'], 'string', 'max' => 1],
            [['pass'], 'string', 'max' => 50],
            [['nombreColaborador', 'apellidosColaborador', 'direccion', 'pais'], 'string', 'max' => 200],
            [['correo', 'telefono'], 'string', 'max' => 45],
            [['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC'], 'unique', 'targetAttribute' => ['rutColaborador', 'idSucursal', 'idArea', 'idCargo', 'idRol', 'idGerencia', 'idperfil', 'idperfilRed', 'idestadisticas', 'idestado', 'idCC']],
            [['idArea'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['idArea' => 'idArea']],
            [['idCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['idCargo' => 'idCargo']],
            [['idCC'], 'exist', 'skipOnError' => true, 'targetClass' => Icentrocosto::className(), 'targetAttribute' => ['idCC' => 'idCC']],
            [['idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocolaborador::className(), 'targetAttribute' => ['idestado' => 'idestado']],
            [['idGerencia'], 'exist', 'skipOnError' => true, 'targetClass' => Gerencia::className(), 'targetAttribute' => ['idGerencia' => 'idGerencia']],
            [['idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['idperfil' => 'idperfil']],
            [['idestadisticas'], 'exist', 'skipOnError' => true, 'targetClass' => Restadisticas::className(), 'targetAttribute' => ['idestadisticas' => 'idestadisticas']],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
            [['idperfilRed'], 'exist', 'skipOnError' => true, 'targetClass' => Rperfilredsocial::className(), 'targetAttribute' => ['idperfilRed' => 'idperfilRed']],
            [['idSucursal'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursal::className(), 'targetAttribute' => ['idSucursal' => 'idSucursal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rutColaborador' => 'Rut Colaborador',
            'dvColaborador' => 'Dv',
            'pass' => 'Contraseña',
            'nombreColaborador' => 'Nombre Colaborador',
            'apellidosColaborador' => 'Apellidos Colaborador',
            'idSucursal' => 'Sucursal',
            'idArea' => 'Area',
            'idCargo' => 'Cargo',
            'idRol' => 'Rol',
            'idGerencia' => 'Gerencia',
            'westadoJefe' => 'Jefe: 1.Si / 0:No',
            'idperfil' => 'Perfil Usuario',
            'idperfilRed' => 'Perfil Red Social',
            'idestadisticas' => 'Estadisticas',
            'idestado' => 'Estado',
            'idCC' => 'Centro de Costo',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'pais' => 'Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcolaboradorbeneficios()
    {
        return $this->hasMany(Bcolaboradorbeneficio::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBpuntajecolaborador()
    {
        return $this->hasOne(Bpuntajecolaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['idArea' => 'idArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargos::className(), ['idCargo' => 'idCargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCC()
    {
        return $this->hasOne(Icentrocosto::className(), ['idCC' => 'idCC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estadocolaborador::className(), ['idestado' => 'idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGerencia()
    {
        return $this->hasOne(Gerencia::className(), ['idGerencia' => 'idGerencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['idperfil' => 'idperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadisticas()
    {
        return $this->hasOne(Restadisticas::className(), ['idestadisticas' => 'idestadisticas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilRed()
    {
        return $this->hasOne(Rperfilredsocial::className(), ['idperfilRed' => 'idperfilRed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursal()
    {
        return $this->hasOne(Sucursal::className(), ['idSucursal' => 'idSucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDdependencias()
    {
        return $this->hasMany(Ddependencias::className(), ['Colaborador_RutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDdependencias0()
    {
        return $this->hasMany(Ddependencias::className(), ['Colaborador_RutColaborador1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias()
    {
        return $this->hasMany(Dependencia::className(), ['rutColaborador1' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependencias0()
    {
        return $this->hasMany(Dependencia::className(), ['rutColaborador2' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialcolaboradors()
    {
        return $this->hasMany(Historialcolaborador::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcontactabilidads()
    {
        return $this->hasMany(Icontactabilidad::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtalleLchUsuarios()
    {
        return $this->hasMany(IdetalleLchUsuario::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtalleinduccions()
    {
        return $this->hasMany(Idetalleinduccion::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJmanuals()
    {
        return $this->hasMany(Idjmanual::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIllamadasRealizadas()
    {
        return $this->hasMany(IllamadasRealizadas::className(), ['rutColaborador' => 'rutColaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIprogresos()
    {
        return $this->hasMany(Iprogreso::className(), ['rutColaborador' => 'rutColaborador']);
    }
}
