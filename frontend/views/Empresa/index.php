<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas Aderentes';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <h1 style="color: #23527c; size: 50px; "><b><?= Html::encode($this->title) ?></b></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'summary' => "<h3 style='margin-bottom: 20px; margin-left: 15px'><b>$dataProvider->totalCount empresas aderentes</b></h3>",
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            //return Html::encode($model->nome);
            Html::encode($model->nome);
            ['view', 'nome' => $model->nome];
            ['view', 'id' => $model->id];
            return   "<h4 style='margin-left: 50px'>$model->id - $model->nome</h4>";

        },
    ]);

    ?>
</div>
