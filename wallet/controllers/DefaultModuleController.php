<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\controllers;

use common\controllers\AuthController;
use \common\models\User;

abstract class DefaultModuleController extends AuthController
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        $this->checkThatUserHasWallet();
        return true;
    }

    // protected

    protected function isWalletRequired()
    {
        return true;
    }

    // private

    private function checkThatUserHasWallet()
    {
        if ($this->isWalletRequired() && !User::current()->hasWallet()) {
            $this->redirect(['/manage/first']);
            \Yii::$app->end();
        }
    }
}
