<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customfatura */

$this->title = 'Alterar Fatura Customizada: ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Customfaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customfatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
