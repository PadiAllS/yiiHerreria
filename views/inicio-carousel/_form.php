<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InicioCarousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inicio-carousel-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo_carousel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parrafo_carousel')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'boton_carousel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_boton_carousel')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'imageFile')->fileInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
