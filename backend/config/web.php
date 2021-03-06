<?php

/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$config = [
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'timeline-event/index',
    'controllerMap' => [
        'file-manager-elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
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
        'i18n' => [
            'class' => \backend\modules\i18n\Module::class,
            'defaultRoute' => 'i18n-message/index'
        ]
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
                'controllers' => ['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers' => ['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['manager'],
            ]
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => \yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => \yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'home-finance' => Yii::getAlias('@backend/views/_gii/crud')
                ],
                'template' => 'home-finance',
                'messageCategory' => 'backend'
            ],
            'model' => [
                'class' => \backend\modules\gii\models\Generator::class,
                'templates' => [
                    'home-finance' => \Yii::getAlias('@backend/modules/gii/views/model')
                ],
                'template' => 'home-finance',
                'messageCategory' => 'backend'
            ]
        ]
    ];
}

return $config;
