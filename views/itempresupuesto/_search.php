<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItempresupuestoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-presupuesto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_itemPresu') ?>

    <?= $form->field($model, 'presupuesto_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'alto_itemPresu') ?>

    <?= $form->field($model, 'ancho_itemPresu') ?>

    <?php // echo $form->field($model, 'precio_itemPresu') ?>

    <?php // echo $form->field($model, 'cantidad_itemPresu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
