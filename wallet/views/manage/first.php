<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use yii\bootstrap\Html;
use \yii\bootstrap\ActiveForm;

?>

<div class="row">
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => false,
                ]); ?>

                <?= $form->field($model, 'name')->input('text'); ?>

                <?= $form->field($model, 'currency')->dropDownList((new \common\components\Currency())->getList()); ?>

                <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>