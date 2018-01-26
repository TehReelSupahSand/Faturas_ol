<?php

use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customfatura */
/* @var $dataProvider app\models\LinhaFatura */

$this->title = "Fatura Customizada | ".$model->numero;
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

    <?=
    DetailView::widget([
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
