<?php
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
AppAsset::register($this);

            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Administrador',
                        'items' => [
                            ['label' => 'Clientes', 'url' => ['/cliente/index']],
                            '<li class="divider"></li>',
                            ['label' => 'Categorias', 'url' => ['/categoria/index']],
                            '<li class="divider"></li>',
                            //    '<li class="dropdown-header">Dropdown Header</li>',
                            ['label' => 'Productos', 'url' => ['/producto/index']],
                            '<li class="divider"></li>',
                            ['label' => 'Presupuestos', 'url' => ['/presupuesto/index']],

                        ]],
                
                
                

            Yii::$app->user->isGuest ?
            ['label' => 'Entrar', 'url' => ['/user/security/login']] :
            ['label' => 'Salir (' . Yii::$app->user->identity->username . ')',
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'post']],
            ['label' => 'Register', 'url' => ['/user/registration/register'],
            'visible' => Yii::$app->user->isGuest]

//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
            ],
            ]);
            NavBar::end();
            ?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

