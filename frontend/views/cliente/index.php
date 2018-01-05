<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model frontend\models\Cliente */

$model = "frontend\models\Cliente";
$user = Yii::$app->user->identity;

$this->title = 'Informação do Cliente';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cliente-index">

    <h1 style="color: #23527c; size: 50px"><b><?= Html::encode("Informação do cliente " ) ?></b></h1>

    <h3 style="float: left; display: inline-block"><b>Nome: </b><?= $user->nome?> </h3> <h3 style="float: left; margin-left: 50px; display: inline-block"><b>Número do Cartão: </b><?= $user->numero_cartao ?></h3> </br></br>

    <h4 style="margin-top: 3%;"><b>Username: </b><?= $user->username ?></h4><br>

    <h4><b>NIF: </b><?= $user->nif ?></h4><br>

    <h4><b>E-Mail: </b><?= $user->email ?></h4><br>

    <?php
    if ($user->telemovel != null)
    {
    echo "<h4><b>Telemóvel: </b>$user->telemovel</h4><br>";
    }
    ?>



    <p>
        <?= Html::a('Alterar Dados', ["update?id=$user->numero_cartao"], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
</div>

