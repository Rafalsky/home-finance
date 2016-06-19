<?php

/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$config = [
    'homeUrl' => \Yii::getAlias('@walletUrl'),
    'controllerNamespace' => 'wallet\controllers',
    'defaultRoute' => 'wallet/index',
    'controllerMap' => [
        'file-manager-elfinder' => [
            'class' => \mihaildev\elfinder\Controller::class,
            'access' => ['manager'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'basePath' => '@storage',
                    'path'   => '/',
                    'access' => ['read' => 'manager', 'write' => 'manager']
                ]
            ]
        ]
    ],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => env('COOKIE_VALIDATION_KEY')
        ],
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => \common\models\User::class,
            'loginUrl' => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => \common\behaviors\LoginTimestampBehavior::class
        ],
    ],
    'modules' => [
    ],
    'as globalAccess' => [
        'class' => \common\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions' => ['login']
            ],
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['logout']
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions' => ['error']
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'allow' => false
            ]
        ]
    ]
];

return $config;
