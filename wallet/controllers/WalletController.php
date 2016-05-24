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

use yii\web\Controller;

class WalletController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = \Yii::t('app', 'Wallet details');
        return $this->render('index');
    }
}
