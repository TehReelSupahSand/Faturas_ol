<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os campos seguintes para efetuar o registo:</p>

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-5">

                <?= $form->field($model, 'nome')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ->label('Password') ?>

                <?= $form->field($model, 'email') ?>



        </div>

        <div class="col-md-5" style="margin-top: 10.09ex;">

            <?= $form->field($model, 'nif')->textInput(['autofocus' => true]) ->label('NIF') ?>

            <?= $form->field($model, 'password_repeat')->passwordInput() ->label('Confirmar Password') ?>

            <?= $form->field($model, 'telemovel')->textInput(['placeholder'=>'Opcional']) ->label('Telemóvel') ?>



        </div>





        </div>
    <div class="form-group">
        <?= Html::submitButton('Registar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
