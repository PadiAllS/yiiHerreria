<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'categoria_id') ?>

    <?= $form->field($model, 'codBarra_producto') ?>

    <?= $form->field($model, 'nombre_producto') ?>

    <?= $form->field($model, 'stock_producto') ?>

    <?php // echo $form->field($model, 'descripcion_producto') ?>

    <?php // echo $form->field($model, 'imagen_producto') ?>

    <?php // echo $form->field($model, 'precio_producto') ?>

    <?php // echo $form->field($model, 'precioM2_producto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
