<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresupuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presupuestos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presupuesto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Presupuesto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_presupuesto',
            'cliente.nombre_cliente',
            'fecha_presupuesto',
            'total',
//            [
//                'label'=>'Monto total',
//                'value'=>function($model){
//                    return $model->getTotal();
//                }
//            ],
            'status_presupuesto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
