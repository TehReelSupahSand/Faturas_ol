<?php

use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customfatura */

$this->title = "Fatura Customizada | ".$model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Customfaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$rows = (new \yii\db\Query())
    ->from('linha_fatura')
    ->where(['id_custom_fatura' => $model->id])
    ->all();

$delCustom_cliente = \frontend\models\CustomFaturaCliente::find($model->id);
$delLinha = \frontend\models\LinhaFatura::find($model->id);
$delFatura = $model::find($model->id);


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

    <h4>Linhas da fatura</h4>
    <?php
    echo 'Valor unitario|€  |   Quantidade  |  Nome do Produto  |  Descricao  |  Valor Total';
    echo "</br>";
    foreach ($rows as $row){
        echo $row['valor_unitario'].'€ ---   '.$row['quantidade'].' --- '.$row['nome_produto'].'---    '.$row['descricao'].'  ---  '.$row['valor_total'] ."€</br>";
    } ?>
</div>
