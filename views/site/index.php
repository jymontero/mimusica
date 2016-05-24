<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">

        <h1>Felicitaciones!</h1>

        <p class="lead">Ya tienes totalmente creada tu aplicacion web con Yii.</p>

        <p class="lead">Este es un crud de usuarios hecho en Yii2 framework.</p>

        <p><?= Html::a('Crear Usuario', ['usuario/'], ['class' => 'btn btn-lg btn-success']) ?></p>

        <a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a>

    </div>

</div>
