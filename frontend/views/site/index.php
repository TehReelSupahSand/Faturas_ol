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

    <?php
        if (Yii::$app->user->isGuest) { ?>

            <h4>Saiba qual o <a href='index.php/site/about'>propósito deste programa</a>, faça <a href='index.php/site/login'>login</a> caso já possua uma conta
            ou <a href='index.php/site/signup'>registe-se</a> caso queira aderir ao programa.</h4>
     <?php   } else { ?>

            <h4>Saiba qual o <a href="index.php/site/about">propósito deste programa</a>.</h4>
       <?php }
    ?>
    </div>

    <?php
        if (Yii::$app->user->isGuest) { ?>

            <div class="container"  align="center" style="margin: 1em 0">
            <h4> <a class=" btn btn-lg btn-primary" href="index.php/site/login"> Leva-me ao Login</a> </h4>
            </div>
    <?php }
    ?>
</div>