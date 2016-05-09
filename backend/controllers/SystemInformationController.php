<?php

/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace backend\controllers;

use probe\Factory;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class SystemInformationController extends Controller
{
    public $layout = 'common';

    public function actionIndex()
    {
        $provider = Factory::create();
        if ($provider) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($key = Yii::$app->request->get('data')) {
                    switch($key){
                        case 'cpu_usage':
                            return$provider->getCpuUsage();
                            break;
                        case 'memory_usage':
                            return ($provider->getTotalMem() - $provider->getFreeMem()) / $provider->getTotalMem();
                            break;
                    }
                }
            } else {
                return $this->render('index', ['provider' => $provider]);
            }
        } else {
            return $this->render('fail');
        }
    }
}
