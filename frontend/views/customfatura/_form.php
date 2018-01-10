<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customfatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customfatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'data')->textInput(['placeholder'=>'AA/MM/DD']) ?>

    <?= $form->field($model, 'nif_empresa')->textInput() ?>

    <?= $form->field($model, 'nome_empresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'morada_empresa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
