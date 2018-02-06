<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LinhaFaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linha Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-fatura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linha Fatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'valor_unitario',
            'quantidade',
            'nome_produto',
            'descricao',
            // 'id_fatura',
            // 'id_custom_fatura',
            // 'valor_total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
