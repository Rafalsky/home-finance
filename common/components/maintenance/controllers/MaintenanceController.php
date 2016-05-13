<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\components\maintenance\controllers;

use yii\web\Controller;

/**
 * Class MaintenanceController
 * @author Eugene Terentev <eugene@terentev.net>
 */
class MaintenanceController extends Controller
{
    public $retryAfter;
    public $maintenanceLayout;
    public $maintenanceView;
    public $maintenanceText;

    public function actionIndex()
    {
        $this->layout = $this->maintenanceLayout;

        \Yii::$app->response->statusCode = 503;
        \Yii::$app->response->headers->set('Retry-After', $this->retryAfter);

        return $this->render($this->maintenanceView, [
            'maintenanceText' => $this->maintenanceText,
            'retryAfter' => $this->retryAfter
        ]);
    }
}
