<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItempresupuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Presupuestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-presupuesto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Item Presupuesto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_itemPresu',
            'presupuesto_id',
            'producto_id',
            'alto_itemPresu',
            'ancho_itemPresu',
            //'precio_itemPresu',
            //'cantidad_itemPresu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
