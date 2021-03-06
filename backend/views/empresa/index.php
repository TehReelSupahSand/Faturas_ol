<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <?php if (Yii::$app->user->identity->auth_key != 'QHqZWOkZcoDRzhESnShjdwQOsnifw_H1'){
        echo "Sem autorização para aceder backend $this->title";
    }
    else{?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'nif',
            'morada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php } ?>
</div>
