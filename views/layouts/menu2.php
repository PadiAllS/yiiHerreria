<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\assets\FrontAsset;

FrontAsset::register($this);

?>



        <div class="container m-3">
            <div class="row">
                <div class="col-md-5">
                    <img alt="logo" src="../imagen/LOGO-01.svg" width="100%" height="110px">
                </div>
            
                <div class="col-md-7">
                    <nav class="nav navbar-collapse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <botton class="navbar-toggle" data-toggle="collapse" data-target=""
                            </div>
                        </div>
                    </nav>
                    
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= yii\helpers\Url::to(['/site/index'])?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <?= yii\helpers\Html::a('Productos',['/site/galery'],['class'=>'nav-link active']) ?>
                            <!--<a class="nav-link active" href="<?php yii\helpers\Url::to(['/site/galery'])?>">Productos</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= yii\helpers\Url::to(['/site/nosotros'])?>">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= yii\helpers\Url::to(['/site/tutoriales'])?>">Tutoriales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= yii\helpers\Url::to(['/presupuesto/nuevo'])?>">Presupuesto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= yii\helpers\Url::to(['/site/contacto'])?>">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= yii\helpers\Url::to(['/site/registrar'])?>">Registro</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['usuario'])) {
                            ?>
                            <li class="nav-item">
                                
                                <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                                    Login <?= $_SESSION['mensajeLog']??''?>
                                </button>
                                
                            </li>
                            <?php
                        } else {
                            if ($_SESSION['permiso']== 'admin')
                            {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../paginas/logout.php">Logout (<?= $_SESSION['usuario'] ?>)</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="../paginas/menuAdmin.php">Administrador</a>
                            </li>
                            <?php
                            } else {
                                ?>
                                <li class="nav-item">
                                <a class="nav-link" href="../paginas/logout.php">Logout (<?= $_SESSION['usuario'] ?>)</a>
                                </li>

                            <?php
                            }

                            
                        }
                        ?>

                    </ul>
                </div>
            </div>


            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">INGRESO DE USUARIO</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                  
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label for="username">
                                                Nombre de Usuario:
                                            </label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">
                                                Password
                                            </label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>

                                        <button type="submit" class="btn btn-success" name="boton">
                                            Acceder
                                        </button>
                                        <a href="../paginas/formularioCrearCliente.php">
                                            <input type="button" class="btn btn-success" value="Registro">
                                        </a>

                                    </form>
                                </div>

                            </div>


                        </div>

                        <!-- Modal footer -->
                        <!--      <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>-->

                    </div>
                </div>
            </div>



