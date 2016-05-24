<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\controllers;

abstract class AuthController extends BaseController
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }
}
