<?php

use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customfatura */
/* @var $dataProvider frontend\models\LinhaFatura */

$this->title = "Fatura Customizada | ".$model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Faturas Customizadas', 'url' => ['index']];
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

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}',
                'header' => "Ações",
                'buttons' => [

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Alterar Linha'),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Apagar Linha'),
                        ]);
                    },

                ],
                'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === 'update') {
                        $url ='updatelinha?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='deletelinha?id='.$model->id;
                        return $url;
                    }

                }
            ],
            ],
    ])?>

    <?php } else { ?>

        <h4 style="color: dodgerblue;">Sem linhas a apresentar</h4>

    <?php } ?>

    <?= Html::a('Adicionar Linha', ['createlinha', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

</div>
