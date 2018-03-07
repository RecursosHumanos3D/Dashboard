<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Colaborador;
use app\controllers\BuscarController;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $rutColaborador = $session['rut'];

        if ($rutColaborador == null) {
            $model = new Colaborador();
            return $this->redirect(['site/login', 'model' => $model]);
        }else{
            return $this->redirect(['about']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $session = Yii::$app->session;

        if ($session['rut'] != null) {
            $session->remove('rut');
        }

        $model = new \app\models\Colaborador();
        if ($model->load(Yii::$app->request->post())) {

            $valid = BuscarController::findColaborador($model->correo, $model->pass);
            

            if ($valid != false) {
                $valid2 = BuscarController::findPerfilred($valid->idperfilRed);
                $session = Yii::$app->session;
                $session['rut'] = $valid->rutColaborador;
                $session['nombreColaborador'] = $valid->nombreColaborador;
                $session['apellidosColaborador'] = $valid->apellidosColaborador;
                $session['foto'] = $valid2->rfoto;

                $session->open();
                $rrhh = BuscarController::tipoPerfil($valid->idperfil);
               if($rrhh !=false){
                Yii::$app->response->redirect(array('site/about'));
              
                } else {

                $model = new \app\models\Colaborador();

                if (Yii::$app->request->post()["Colaborador"]["correo"] == "" && Yii::$app->request->post()["Colaborador"]["pass"] == "") {
                    \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-12">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                           Ingrese sus credenciales</p>
                        </div>
                    </div>');
                } else {
                    \Yii::$app->getSession()->setFlash('error', ' <div class="col-sm-12 col-md-8" align="center">
                        <div class="alert alert-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                           <span class="glyphicon glyphicon-no"></span> <strong>Mensaje de error</strong>
                            <hr class="message-inner-separator">
                            <p>
                            Error en el ingreso de datos. Verifique si tiene permisos para acceder a esta página</p>
                        </div>
                    </div>');
                }
}


                $this->layout = 'loginLayout';
                return $this->render('login', [
                            'model' => $model,
                ]);
            }
        } else {
            $this->layout = 'loginLayout';
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
