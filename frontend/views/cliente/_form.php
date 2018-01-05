<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_password')->passwordInput(['placeholder'=>'Insira caso queira alterar']) ?>

    <?= $form->field($model, 'telemovel')->textInput(['maxlength' => true,'placeholder'=>'Opcional']) ?>

    <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar Alterações', ['class' => 'btn btn-success',
        'data' => [
            'confirm' => 'Tem a certeza que pretende guardar as alterações efetuadas?',
            'method' => 'post',
        ],
        ]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
