<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fatura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$linhaFatura = frontend\models\LinhaFatura::find()
    ->where(['=', 'id_fatura', 2])
    ->all();

?>

<div class="fatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza q pretende eliminar esta fatura?',
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
            //'imagem_path',
        ],
    ]) ?>

    <?php //return $linhaFatura; ?>

    <?= DetailView::widget([
        'model' => $linhaFatura,
        'attributes' => [
            'valor_unitario',
            'nome_produto',
            'valor_total',
        ],
    ]) ?>

</div>
