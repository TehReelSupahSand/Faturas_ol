<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LinhaFatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linha-fatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_unitario')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
