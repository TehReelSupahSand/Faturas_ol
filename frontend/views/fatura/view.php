<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fatura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$linhaFatura = frontend\models\LinhaFatura::find()
    ->where(['id_fatura' => $model->id]);

    $linhaFatura = Yii::$app->getDb()->createCommand("SELECT * FROM linha_fatura WHERE id_fatura = $model->id");
    $result = $linhaFatura->queryAll();
?>

<div class="fatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?php $linhaFatura->queryAll() ?>

    <?= DetailView::widget([
        'model' => $result,
        'attributes' => [
            'nome_produto',
            'valor_unitario',
            //'quantidade',
            'valor_total',
        ],
    ]) ?>

</div>
