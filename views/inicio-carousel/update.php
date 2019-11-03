<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InicioCarousel */

$this->title = 'Update Inicio Carousel: ' . $model->id_inicio_carousel;
$this->params['breadcrumbs'][] = ['label' => 'Inicio Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inicio_carousel, 'url' => ['view', 'id' => $model->id_inicio_carousel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inicio-carousel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
