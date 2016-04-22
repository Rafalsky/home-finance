<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers;

use yii\web\Controller;

abstract class AuthController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            $this->redirect(['/user/login']);
            \Yii::$app->end();
        }
        return parent::beforeAction($action);
    }
}
