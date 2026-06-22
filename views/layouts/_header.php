<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;


$items = [


    [
        'label'=>'🏠 Dashboard',
        'url'=>['/site/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'🌍 Packages',
        'url'=>['/package/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'👥 Customers',
        'url'=>['/customer/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'📅 Bookings',
        'url'=>['/booking/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'💰 Payments',
        'url'=>['/payment/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'👤 Admin',
        'url'=>['/admin/index'],
        'visible'=>!Yii::$app->user->isGuest,
    ],


    [
        'label'=>'ℹ️ About',
        'url'=>['/site/about'],
    ],


    [
        'label'=>'📞 Contact',
        'url'=>['/site/contact'],
    ],


    [
        'label'=>'🔑 Login',
        'url'=>['/site/login'],
        'visible'=>Yii::$app->user->isGuest,
    ],



    [
        'label'=>'🚪 Logout',

        'url'=>['/site/logout'],

        'linkOptions'=>[

            'data'=>[

                'method'=>'post',

                'confirm'=>'Are you sure you want to logout?',

            ],

        ],

        'visible'=>!Yii::$app->user->isGuest,

    ],


];

?>


<header id="header">


<?php NavBar::begin([

    'brandLabel'=>'🌍 Safari Travel',

    'brandUrl'=>Yii::$app->homeUrl,

    'options'=>[

        'class'=>'navbar-expand-md navbar-dark bg-dark fixed-top shadow',

    ],

]); ?>



<?= Nav::widget([

    'options'=>[

        'class'=>'navbar-nav me-auto mb-2 mb-md-0',

    ],

    'encodeLabels'=>false,

    'items'=>$items,

]); ?>




<?php if(!Yii::$app->user->isGuest): ?>

<span class="navbar-text text-white me-3">

Welcome,

<?= Html::encode(
    Yii::$app->user->identity->username ?? 'Admin'
) ?>

</span>

<?php endif; ?>




<?= Html::button(

    '🌙',

    [

        'id'=>'theme-toggle',

        'class'=>'btn btn-outline-light btn-sm',

        'title'=>'Change Theme',

    ]

); ?>




<?php NavBar::end(); ?>


</header>