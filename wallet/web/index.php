<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// Composer
require(__DIR__.'/../../vendor/autoload.php');

// Environment
require(__DIR__.'/../../common/env.php');

// Yii
require(__DIR__.'/../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__.'/../../common/config/bootstrap.php');
require(__DIR__.'/../config/bootstrap.php');


$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/../../common/config/base.php'),
    require(__DIR__.'/../../common/config/web.php'),
    require(__DIR__.'/../config/base.php'),
    require(__DIR__.'/../config/web.php')
);

(new yii\web\Application($config))->run();
