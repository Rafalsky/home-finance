<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


$params = require(__DIR__ . '/params.php');
$security = require(__DIR__ . '/security.local.php');

$config = [
    'id' => 'HomeFinance',
    'name' => 'Home Finance',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => yii\i18n\PhpMessageSource::class
                ],
            ],
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::class,
        ],
        'request' => [
            'cookieValidationKey' => $security['cookieValidationKey']
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => dektrium\rbac\Module::class,
        ],
        'wallet' => [
            'class' => app\modules\wallet\Module::class,
        ],
        'user' => [
            'class' => dektrium\user\Module::class,
            // you will configure your module inside this file
            // or if need different configuration for frontend and backend you may
            // configure in needed configs
        ],
        'installation' => [
            'class' => 'app\modules\installation',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
    ];
}

return $config;
