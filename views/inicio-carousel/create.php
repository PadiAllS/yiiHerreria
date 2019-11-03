<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InicioCarousel */

$this->title = 'Create Inicio Carousel';
$this->params['breadcrumbs'][] = ['label' => 'Inicio Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inicio-carousel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
