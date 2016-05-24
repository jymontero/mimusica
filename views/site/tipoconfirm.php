<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
use yii\helpers\Html;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <ul>
            <li><label>Name</label>: <?= Html::encode($model->nombres) ?></li>
            <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
        </ul>
    </body>
</html>
