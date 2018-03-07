<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    html {
        background: url(login.jpg);
        background-size: cover;
    }
</style>
<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../web/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../web/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../web/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../web/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../web/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style type="text/css">
    .card-header.text-center {
    background: linear-gradient(60deg, #e8000a, #b5181f)!important;
}
    button.btn.btn-primary.login {
    background-color: #e85959!important;
}
    .alert.alert-danger {
    background-color: #1b1111c9!important;
    color: #ffffff;
    border-radius: 3px;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(138, 125, 124, 0.4);
    margin-left: 43%!important;
    margin-right: -11%!important;
    }
    .card.card-login.card-hidden {
    margin-top: 34%;
}

</style>



 <?php $form = ActiveForm::begin(); ?>


<body>
      
               
                    
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="post" action="#">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                        
                                    </div>
                                    <p class="category text-center">
                                       
                                    </p>
                                    <div class="card-content">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                  <?= $form->field($model, 'correo')->textInput(['autofocus' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                              <?= $form->field($model, 'pass')->passwordInput() ?>
                                            </div>
                                       </div>
                                    <div class="footer text-center">
                                        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary login', 'name' => 'login-button']) ?>
            </div>
        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            

   
     
       

         <?= Yii::$app->session->getFlash('error'); ?>
        

    <?php ActiveForm::end(); ?>

</div>
</div>
</body>
<script src="../web/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../web/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../web/js/material.min.js" type="text/javascript"></script>

