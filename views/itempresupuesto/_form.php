<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuesto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-presupuesto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'presupuesto_id')->textInput() ?>

    <?= $form->field($model, 'producto_id')->textInput() ?>

    <?= $form->field($model, 'alto_itemPresu')->textInput() ?>

    <?= $form->field($model, 'ancho_itemPresu')->textInput() ?>

    <?= $form->field($model, 'precio_itemPresu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad_itemPresu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
