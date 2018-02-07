<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LinhaFatura */

$this->title = 'Alterar Linha da Fatura: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faturas Customizadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linha-fatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formLinha', [
        'model' => $model,
    ]) ?>

</div>
