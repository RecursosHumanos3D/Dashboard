<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ColaboradorSearch;
use app\models\Colaborador;
use app\models\rperfilredsocial;


class BuscarController extends Controller {

    public static function findColaboradors($correo) {
        
        $model3 = Colaborador::find()
                ->where(['correo' => $correo])
                ->one();
                
        if($model3 != null){
            return $model3;
        }
        else{
            return false;
        }

    }

    public static function findColaborador($correo, $pass) {

        $model = Colaborador::find()
                ->where(['correo' => $correo, 'pass' => $pass])
                ->one();

        if ($model != null) {
            return $model;
        } else {
            return false;
        }
    }

     public static function encuentraColaboradores(){

        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('colaborador')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }

     public static function findColaboradorRut($rutColaborador) {
        if (($model = Colaborador::findOne(['rutColaborador' => $rutColaborador])) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public static function findPerfil($id) {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public static function findDependencias($rut) {
        if (($model = Dependencia::findOne($rut)) !== null) {
            return $model;
        }
        var_dump("no lo encontro");
        die();
    }

    public static function tipoPerfil($idperfil){

        $model = Colaborador::find()
                ->where(['idperfil' => $idperfil])
                ->one();
              
        if($model["idperfil"] == 1){
            return true;
        }else{
        return false;
        
    }
       
    }

    public static function findPerfilred($id) {
        if (($model = Rperfilredsocial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findBeneficios(){

        $query = new \yii\db\Query;
        $query->select([
                    '*',
        ])
        ->from('bbeneficios')
        ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $model;
    }



    }
