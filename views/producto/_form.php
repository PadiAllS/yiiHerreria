<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'codBarra_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_producto')->textInput() ?>

    <?= $form->field($model, 'descripcion_producto')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'imagen_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_producto')->textInput() ?>

    <?= $form->field($model, 'precioM2_producto')->textInput() ?>
    
     <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
