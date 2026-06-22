<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [

    'id' => 'basic',

    'basePath' => dirname(__DIR__),

    'bootstrap' => ['log'],


    'container' => [

        'singletons' => [

            \yii\mail\MailerInterface::class => [

                'class' => \yii\symfonymailer\Mailer::class,

                'useFileTransport' => true,

                'viewPath' => '@app/mail',

            ],

        ],

    ],


    'aliases' => [

        '@bower' => '@vendor/bower-asset',

        '@npm'   => '@vendor/npm-asset',

    ],



    'components' => [


        'request' => [

            'cookieValidationKey' => 'aMsNOrhj6smfZh8UKuBMknu7gXRjLMcd',

        ],



        'cache' => [

            'class' => \yii\caching\FileCache::class,

        ],




        // USER AUTHENTICATION

        'user' => [

            'identityClass' => \app\models\User::class,

            'enableAutoLogin' => false,

        ],




        'errorHandler' => [

            'errorAction' => 'site/error',

        ],




        'mailer' => \yii\mail\MailerInterface::class,





        'log' => [

            'traceLevel' => YII_DEBUG ? 3 : 0,


            'targets' => [

                [

                    'class' => \yii\log\FileTarget::class,

                    'levels' => [

                        'error',

                        'warning'

                    ],

                ],

            ],

        ],




        'db' => $db,





        // ENABLE PRETTY URLS

        'urlManager' => [

            'enablePrettyUrl' => true,

            'showScriptName' => false,

            'enableStrictParsing' => false,

            'rules' => [

            ],

        ],



    ],



    'params' => $params,

];





if (YII_ENV_DEV) {


    // Debug module

    $config['bootstrap'][] = 'debug';


    $config['modules']['debug'] = [

        'class' => \yii\debug\Module::class,

    ];





    // Gii code generator

    $config['bootstrap'][] = 'gii';


    $config['modules']['gii'] = [

        'class' => \yii\gii\Module::class,

    ];



}



return $config;