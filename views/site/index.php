<?php

/* @var $this yii\web\View */

$this->title = 'Rejas Argentinas';

$this->params['frontend']= true;

        ?>

<div class="row">
    <div class="col-12">
    <?php
    echo $this->render('carruselDinamico', ['carousels'=>$carousels]);
//            require_once('carruselDinamico.php');
    ?>
    </div>
</div>
