<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


$params = require(__DIR__.'/params.php');
$security = require(__DIR__.'/security.local.php');

$config = [
    'id' => 'HomeFinance',
    'name' => 'Home Finance',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => \yii\i18n\PhpMessageSource::class
                ],
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'request' => [
            'cookieValidationKey' => $security['cookieValidationKey']
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::class,
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__.'/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'user' => [
            'class' => yii\web\User::class,
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_homeFinancePL',
                'domain' => '.home-finance.pl',
                'path' => '/',
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => \yii\debug\Module::class,
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => \yii\gii\Module::class,
    ];
}

return $config;
