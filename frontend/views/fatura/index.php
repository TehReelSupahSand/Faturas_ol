<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-index">

    <h1><?= Html::encode($this->title." | ".Yii::$app->user->identity->nome) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>

    <?= GridView::widget([
            'summary' => '',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'numero',
            'data',
            //'imagem_path',
            //'favorito',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {delete}'],
        ],
    ]); ?>
    <br>
    <p>
        <?php //Html::a('Create Fatura', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Fatura Costumizada', ['customfatura/index'],['class' => 'btn btn-primary'])?>
    </p>
</div>
