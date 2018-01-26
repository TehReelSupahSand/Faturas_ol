<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fatura */
/* @var $dataProvider frontend\models\LinhaFatura */

$this->title = "Fatura | ".$model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="fatura-view">

    <h1><?= Html::encode('Fatura: '.$model->numero) ?></h1>

    <p>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar esta fatura?',
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

    <?php if ($dataProvider!=""){ ?>

        <b><h4>Linhas da fatura</h4></b>

        <?=\yii\grid\GridView::widget([
            'summary' => "",
            'dataProvider' => $dataProvider,
            'columns' => [
                //'id',
                'nome_produto',
                'valor_unitario',
                'quantidade',
                'descricao',
                'valor_total',
            ],
        ])?>

    <?php } else { ?>

        <h4 style="color: dodgerblue;">Sem linhas a apresentar</h4>

    <?php } ?>

</div>
