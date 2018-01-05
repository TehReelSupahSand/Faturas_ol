<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sobre nós';
//$this->params['breadcrumbs'][] = $this->title;

$results = \app\models\Empresa::find()->count();


?>
<body>
<br class="site-about">
<div class="col-md">

        <div class="col-md-8">
            <h1><b>O que é o Faturas.OL?</b></h1>

            <h4 style="margin-left: 20px">
                O Faturas.OL é um serviço de armazenamento e gestão das suas faturas.
                Tem como premissa a existencia de um cartão digital que quando é utilizado numa das empresas
                aderentes ao programa enviará uma copia do texto da fatura, com todos os elementos apresentados em papel,
                para a nossa plataforma e disponibilizá-la-á ao cliente associado sendo assim possível ter acesso à mesma
                independentemente do local, desde que haja uma conexão à internet.
            </h4>
        </div>
    <br>

</div>

<div class="col-md">

         <div class="col-md-8">
             <h1><b>Como posso aderir?</b></h1>

             <h4 style="margin-left: 20px">
                SIMPLES. Basta criar uma conta clicando em <a href="signup">Registar</a> fornecendo os dados pedidos. <br>
                 A patir do momento que o número do seu cartão é disponibilizado, pode começar a <br> usa-lo nas <b><?=$results?></b> <a href="../empresa/index">empresas aderentes</a>.
             </h4> <br>
        </div>

</div>
</body>
    <!-- <code><?= __FILE__ ?></code-->