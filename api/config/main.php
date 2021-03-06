<?php

use yii\web\JsonParser;

$params = array_merge(
    require __DIR__.'/../../common/config/params.php',
    require __DIR__.'/../../common/config/params-local.php',
    require __DIR__.'/params.php',
    require __DIR__.'/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => JsonParser::class,
            ],
        ],
        'user' => [
            'identityClass' => 'api\modules\v1\models\User',
            'enableAutoLogin' => false,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => [
                    'v1/user', 'v1/food', 'v1/comment',
                ]],
            ],
        ],
        'jwt' => [
            'class' => \sizeg\jwt\Jwt::class,
            'key' => 'atupuertaapi', // Change this for production enviroment
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'api/index',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
];
