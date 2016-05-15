<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace frontend\modules\api\v1;

class Module extends \frontend\modules\api\Module
{
    public $controllerNamespace = 'frontend\modules\api\v1\controllers';

    public function init()
    {
        parent::init();
        \Yii::$app->user->identityClass = 'frontend\modules\api\v1\models\ApiUserIdentity';
        \Yii::$app->user->enableSession = false;
        \Yii::$app->user->loginUrl = null;
    }
}
