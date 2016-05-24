<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="site-login form-horizontal ">


    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-14\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-4 control-label'],
                ],
    ]);
    ?>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'contrasenia')->passwordInput() ?>
    <?= $form->field($model, 'nombres') ?>
    <?= $form->field($model, 'apellidos') ?>
    <?= $form->field($model, 'genero') ?>
    <?= $form->field($model, 'fecha_nacimiento') ?>
    <?= $form->field($model, 'id_tipo_usuario') ?>
    
    <div class="form-group">
        <div class="col-lg-offset-4 col-lg-5">
            <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>
