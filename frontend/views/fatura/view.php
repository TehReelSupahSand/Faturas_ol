<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fatura */

$this->title = "Fatura | ".$model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$rows = (new \yii\db\Query())
    ->from('linha_fatura')
    ->where(['id_fatura' => $model->id])
    //->limit(10)
    ->all();

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

    <h4>Linhas da fatura</h4>

    <?php
    echo 'Valor unitario|€  |  Nome do Produto  |  Descricao  |  Valor Total';
    echo "</br>";
    foreach ($rows as $row){
        echo $row['valor_unitario'].'€ ---   '.$row['nome_produto'].'---    '.$row['descricao'].'  ---  '.$row['valor_total'] ."€</br>";
    } ?>

</div>
