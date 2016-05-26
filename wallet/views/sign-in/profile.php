<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('wallet', 'Edit profile')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::className(), [
        'url'=>['avatar-upload']
    ]); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255]); ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => 255]); ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255]); ?>

    <?= $form->field($model, 'locale')->dropDownList(Yii::$app->params['availableLocales']); ?>

    <?= $form->field($model, 'gender')->dropDownList([
        UserProfile::GENDER_FEMALE => \Yii::t('wallet', 'Female'),
        UserProfile::GENDER_MALE => \Yii::t('wallet', 'Male')
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(\Yii::t('wallet', 'Update'), ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
