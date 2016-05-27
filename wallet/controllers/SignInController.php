<?php

/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\controllers;

use wallet\models\LoginForm;
use wallet\models\AccountForm;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SignInController extends Controller
{
    public $defaultAction = 'login';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post']
                ]
            ]
        ];
    }

    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }

    public function actionLogin()
    {
        $this->layout = 'base';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionProfile()
    {
        $model = \Yii::$app->user->identity->userProfile;
        if ($model->load($_POST) && $model->save()) {
            \Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => \Yii::t('backend', 'Your profile has been successfully saved', [], $model->locale)
            ]);
            return $this->refresh();
        }
        return $this->render('profile', ['model' => $model]);
    }

    public function actionAccount()
    {
        $user = \Yii::$app->user->identity;
        $model = new AccountForm();
        $model->username = $user->username;
        $model->email = $user->email;
        if ($model->load($_POST) && $model->validate()) {
            $user->username = $model->username;
            $user->email = $model->email;
            if ($model->password) {
                $user->setPassword($model->password);
            }
            $user->save();
            \Yii::$app->session->setFlash('alert', [
                'options'=>['class' => 'alert-success'],
                'body' => \Yii::t('backend', 'Your account has been successfully saved')
            ]);
            return $this->refresh();
        }
        return $this->render('account', ['model' => $model]);
    }
}
