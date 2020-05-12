<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
//    'bootstrap' => ['log'],
    'layout' => 'optpolymer',
    'language' => 'ru-RU',
//    'layout' => 'main',
//    'defaultRoute' => 'optpolymer',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'QMchbYGm4xP8v5RPRnti3WGP12UKPHxN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User_opt',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
/*
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
*/
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
		'/'  => 'optpolymer/index',
		'/about.html'  => 'optpolymer/about',
		'/paneli_pvh.html'  => 'optpolymer/pvh',
		'/mdf_hdf_paneli.html'  => 'optpolymer/mdf',
		'/materiali_dlya_narugnoy_otdelki.html'  => 'optpolymer/fasadka',
		'/accessuar.html'  => 'optpolymer/accesuar',
		'/login'  => 'optpolymer/login',
		'/logout'  => 'optpolymer/logout',
		'/register'  => 'optpolymer/register',
		'/lk'  => 'optpolymer/lk',
		'/orders'  => 'optpolymer/orders',
		'/showperson'  => 'optpolymer/showperson',
                'pattern' => 'optpolymer',
                'route' => 'optpolymer/index',
                'suffix' => '.html',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.88.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*'],
    ];
}

return $config;
