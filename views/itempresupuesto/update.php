<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemPresupuesto */

$this->title = 'Update Item Presupuesto: ' . $model->id_itemPresu;
$this->params['breadcrumbs'][] = ['label' => 'Item Presupuestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_itemPresu, 'url' => ['view', 'id' => $model->id_itemPresu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-presupuesto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
