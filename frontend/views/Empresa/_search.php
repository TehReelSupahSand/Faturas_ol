<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomfaturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customfatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'nif_empresa') ?>

    <?= $form->field($model, 'nome_empresa') ?>

    <?php // echo $form->field($model, 'morada_empresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
