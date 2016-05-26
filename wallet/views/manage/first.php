<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \wallet\models\LoginForm */

$this->params['breadcrumbs'][] = $this->title;
$this->params['body-class'] = 'login-page';
?>
<div class="login-box">
    <div class="login-logo">
        <?= Html::encode($this->title); ?>
    </div><!-- /.login-logo -->
    <div class="header"></div>
    <div class="login-box-body">

        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            'enableAjaxValidation'   => false,
        ]); ?>

        <?php ActiveForm::end(); ?>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="body">
            <?= $form->field($model, 'currency')->dropDownList((new \common\components\Currency())->getList()); ?>
            <?php
            $field = $form->field($model, 'name');
            $field->template = "{label}\n{error}\n{input}";
            echo $field->input(['maxlength' => 255]);
            ?>
        </div>
        <div class="footer">
            <?= Html::submitButton(Yii::t('wallet', 'Create'), [
                'class' => 'btn btn-primary btn-flat btn-block',
                'name' => 'create-wallet-button'
            ]); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>