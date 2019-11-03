<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['frontend'] = true;
/* @var $presupuesto app\models\Presupuesto */
/* @var $item app\models\ItemPresupuesto */
?>

<div class="row">
    <div class="col-md-12 alert alert-primary">
        <h3>PRESUPUESTO</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>ALto</th>
                    <th>Ancho</th>
                    <th>Precio</th>
                    <th>borrar</th>

                </tr>
            </thead>

            <?php foreach ($presupuesto->itemPresupuestos as $item): ?>   

                <tr>
                    <td><?php echo $item->producto->nombre_producto ?></td>
                    <td><?php echo $item->cantidad_itemPresu ?></td>
                    <td><?php echo $item->alto_itemPresu ?></td>
                    <td><?php echo $item->ancho_itemPresu ?></td>
                    <td><?php echo $item->getMonto() ?></td>
                    <td>
                        <?=
                        Html::a('Borrar', ['delete', 'id' => $itemPresupuesto->id_itemPresu], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="4" class="text-right">Total</th>
                <td><?php echo $presupuesto->getTotal() ?></td>
            </tr>
            <tr>
                <td colspan="6">
                    <button class="btn btn-primary btn-lg btn-block" 
                            name="enviarPresupuesto" 
                            value="enviarPresupuesto" 
                            type="button" data-toggle="modal" data-target="#cliente-modal">Confirmar Presupuesto
                    </button>
                </td>
            </tr>
        </table>
    </div>
</div>

<br>
<br>


<div class="row">
    <div class="columna col-md-4">
        <div>
            <H3>Agregar Productos</H3>
        </div>
    </div>    
    <div class="columna col-md-8">
        <div class="float-right">
            <form role="form" class="form-inline" >
                <div class="form-group">
                    <input type="text" class="form-control" id="nombre" name="searchProd" value='<?= $_GET['searchProd'] ?? '' ?>'>
                </div>
                <button type="submit" class="btn btn-primary" name="quickSearchProd">
                    Buscar
                </button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <?php
    foreach ($productos as $producto):
        /* @var $producto app\models\Producto */
        ?>
        <div class="col-md-3">
            <div class="card">
                <img 
                    title="<?= $producto->nombre_producto ?>" 
                    alt="<?= $producto->nombre_producto ?>" 
                    class="card-img-top"
                    src="<?= yii\helpers\Url::home(true) . $producto->imagen_producto ?>"
                    height="250px"
                    >    
                <!--                data-toggle="popover"
                                data-trigger="hover"
                                data-content="<?// =  $producto->getDescripcionProducto ?>"-->

                <div class="card-body">
                    <span><?= $producto->nombre_producto ?></span>
                    <h5>$ <?= $producto->precioM2_producto ?>-M2</h5>
                    <p class="card-text">Descripcion</p>

                    <!--<form action="../procesos/crearPresupuesto.php" method="post">-->
                    <?php
                    $model = $itemPresupuesto;
                    $form = ActiveForm::begin();
                    ?>

                    <?= $form->field($model, 'producto_id')->hiddenInput(['value' => $producto->id_producto]) ?>

                    <?= $form->field($model, 'ancho_itemPresu')->textInput() ?>
                    <?= $form->field($model, 'alto_itemPresu')->textInput() ?>
                    <?= $form->field($model, 'cantidad_itemPresu')->textInput() ?>

                    <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="agregar" 
                            type="submit">Agregar al Presupuesto
                    </button>
                    <!--</form>-->
                    <?php ActiveForm::end(); ?>


                </div>


            </div>
        </div>
        <?php
    endforeach;
    ?>
</div>

<div class="modal" id="cliente-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">INGRESO DE USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="">
                    <div class="cliente-form">

                        <?php 
                        $model = $cliente;
                        $form = ActiveForm::begin(['action'=>['/presupuesto/confirmar']]); ?>

                        <?= $form->field($model, 'nombre_cliente')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'tipoDoc_cliente')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'nroDoc_cliente')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'direccion_cliente')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'mail_cliente')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'tel_cliente')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
