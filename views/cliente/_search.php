<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'nombre_cliente') ?>

    <?= $form->field($model, 'tipoDoc_cliente') ?>

    <?= $form->field($model, 'nroDoc_cliente') ?>

    <?= $form->field($model, 'direccion_cliente') ?>

    <?php // echo $form->field($model, 'mail_cliente') ?>

    <?php // echo $form->field($model, 'tel_cliente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
