<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customfatura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customfaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customfatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Quer mesmo eliminar esta fatura?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'numero',
            'data',
            'nome_empresa',
            'nif_empresa',
            'morada_empresa',
        ],
    ]) ?>

</div>
