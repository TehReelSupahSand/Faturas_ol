<?php

/* @var $this yii\web\View /

use yii\helpers\Html;

/ @var $this yii\web\View /
/ @var $form yii\bootstrap\ActiveForm /
/ @var $model \common\models\LoginForm */

$this->title = 'Faturas.OL';

?>
<div class="site-index">
    <div class="container" align="center">
        <h1>Bem-vindo ao</h1>
        <img  height="50%" width="50%" style=" margin:1em 0;  display: block" src="<?= Yii::$app->request->baseUrl ?>/logo/logogud.png">
        <p>Também pode obter a nossa aplicação na Google Play Store.</p>
    </div>

    <div class="container"  align="center" style="margin: 1em 0;; ">
        <p> <a class=" btn btn-lg btn-primary" href="index.php/site/login"> Leva-me ao Login</a> </p>
    </div>

</div>