<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <?php if (Yii::$app->user->identity->auth_key != 'QHqZWOkZcoDRzhESnShjdwQOsnifw_H1'){
        echo "Sem autorização para aceder backend $this->title";
    }
    else{?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'numero_cartao',
            'nome',
            'email:email',
            'username',
            //'password_hash',
            // 'telemovel',
            // 'nif',
            // 'auth_key',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>

    <?php } ?>
</div>
