<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InicioCarouselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inicio Carousels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inicio-carousel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inicio Carousel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inicio_carousel',
            'titulo_carousel',
            'parrafo_carousel:ntext',
            'boton_carousel',
            'url_boton_carousel:url',
            //'image_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
