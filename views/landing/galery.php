<?php

/* @var $this yii\web\View */

//$this->title = 'Rejas Argentinas';

$this->params['frontend']= true;

?>
<h1>hola</h1>
<!--<div class="row">-->
    <!--<div class="col-12">-->
    <?php
//            require_once 'feProducto.php';
          echo  $this->render('feProducto');
    ?>
    <!--</div>-->
<!--</div>-->
