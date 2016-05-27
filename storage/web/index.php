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

// Bootstrap
require(__DIR__.'/../../common/config/bootstrap.php');

// App Config
$config = require(__DIR__.'/../config/base.php');

(new yii\web\Application($config))->run();
