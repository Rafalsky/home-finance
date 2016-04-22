<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\wallet\controllers;

use \app\controllers\AuthController;
use app\models\User;

abstract class DefaultModuleController extends AuthController
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action) && $this->isWalletRequired() && !User::current()->hasWallet()) {
            $this->redirect(['/wallet/manage/first']);
            \Yii::$app->end();
        }
        return true;
    }

    protected function isWalletRequired()
    {
        return true;
    }
}
