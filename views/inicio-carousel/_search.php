<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InicioCarouselSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inicio-carousel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_inicio_carousel') ?>

    <?= $form->field($model, 'titulo_carousel') ?>

    <?= $form->field($model, 'parrafo_carousel') ?>

    <?= $form->field($model, 'boton_carousel') ?>

    <?= $form->field($model, 'url_boton_carousel') ?>

    <?php // echo $form->field($model, 'image_path') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
