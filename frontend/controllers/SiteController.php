<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace frontend\controllers;

use frontend\models\ContactForm;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(\Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->contact(\Yii::$app->params['adminEmail'])) {
                \Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            } else {
                \Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
