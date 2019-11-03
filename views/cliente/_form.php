<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoDoc_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nroDoc_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_cliente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
