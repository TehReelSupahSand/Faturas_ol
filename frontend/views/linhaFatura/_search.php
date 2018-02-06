<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LinhaFaturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linha-fatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'valor_unitario') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'nome_produto') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'id_fatura') ?>

    <?php // echo $form->field($model, 'id_custom_fatura') ?>

    <?php // echo $form->field($model, 'valor_total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
