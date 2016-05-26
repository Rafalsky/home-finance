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

use \common\models\User;
use yii\web\Controller;

abstract class DefaultModuleController extends Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action) && $this->isWalletRequired() && !User::current()->hasWallet()) {
            $this->redirect(['/manage/first']);
            \Yii::$app->end();
        }
        return true;
    }

    // protected

    protected function isWalletRequired()
    {
        return true;
    }
}
