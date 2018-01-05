<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cliente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->numero_cartao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->numero_cartao], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    if ($model->telemovel != null)
    {
        ?>
    <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'numero_cartao',
                'nome',
                'email:email',
                'username',
                //'password_hash',
                'telemovel',
                'nif',
                //'auth_key',
            ],
        ])?>
    <?php
    }
     else { ?>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'numero_cartao',
            'nome',
            'email:email',
            'username',
            //'password_hash',
            //'telemovel',
            'nif',
            //'auth_key',
        ],
    ])?>
   <?php } ?>

</div>
