<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\wallet;

class Module extends \yii\base\Module
{
    public function init()
    {
        $this->layout = 'main';
        $this->controllerNamespace = 'app\modules\wallet\controllers';
        $this->defaultRoute = 'wallet';
        parent::init();
    }
}
