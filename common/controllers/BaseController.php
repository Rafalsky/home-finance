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

use common\models\base\BaseModel;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    protected function updateWithPostRequest(BaseModel $model)
    {
        if (\Yii::$app->request->isPost && $attributes = \Yii::$app->request->post($model->getShortClassName())) {
            $model->attributes = $attributes;
            if ($model->save()) {
                \Yii::$app->session->addFlash('alert', [
                    'body' => $this->getSuccessMessage(),
                    'options' => [
                        'class' => 'alert-success'
                    ]
                ]);
                $this->afterSave();
            } else {
                die(var_dump($model->errors));
                \Yii::$app->session->addFlash('alert', [
                    'body' => $this->getFailedMessage(),
                    'options' => [
                        'class' => 'alert-error'
                    ]
                ]);
            }
        }
        return $model;
    }

    protected function getSuccessMessage()
    {
        return \Yii::t('common', 'Model has been saved');
    }

    protected function getFailedMessage()
    {
        return \Yii::t('common', 'Error while saving model');
    }

    protected function afterSave()
    {
    }
}
