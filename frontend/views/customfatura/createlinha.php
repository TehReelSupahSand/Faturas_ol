<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LinhaFatura */

$this->title = 'Criar Linha';
$this->params['breadcrumbs'][] = ['label' => 'Linha Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-fatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formLinha', [
        'model' => $model,
    ]) ?>

</div>
