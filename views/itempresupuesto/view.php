<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuesto */

$this->title = $model->id_itemPresu;
$this->params['breadcrumbs'][] = ['label' => 'Item Presupuestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-presupuesto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_itemPresu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_itemPresu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_itemPresu',
            'presupuesto_id',
            'producto_id',
            'alto_itemPresu',
            'ancho_itemPresu',
            'precio_itemPresu',
            'cantidad_itemPresu',
        ],
    ]) ?>

</div>
