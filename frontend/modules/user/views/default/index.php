<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2><?= Yii::t('frontend', 'Profile settings') ?></h2>

    <?= $form->field($model->getModel('profile'), 'picture')->widget(
        Upload::classname(),
        [
            'url' => ['avatar-upload']
        ]
    )?>

    <?= $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model->getModel('profile'), 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

    <?= $form->field($model->getModel('profile'), 'gender')->dropDownlist([
        \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
        \common\models\UserProfile::GENDER_MALE => Yii::t('frontend', 'Male')
    ], ['prompt' => '']) ?>

    <h2><?= Yii::t('frontend', 'Account Settings') ?></h2>

    <?= $form->field($model->getModel('account'), 'username') ?>

    <?= $form->field($model->getModel('account'), 'email') ?>

    <?= $form->field($model->getModel('account'), 'password')->passwordInput() ?>

    <?= $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
