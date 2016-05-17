<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var $model \common\models\Company
 */
use \yii\bootstrap\ActiveForm;

?><div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= \Yii::t('backend', 'Add new Company'); ?></h3></div>
            <div class="panel-body">

                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => false,
                ]); ?>
                <div class="form-group">
                    <?= $form->field($model, 'name'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'nationality')->dropDownList(\common\components\Nationality::getList()); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'about')->textarea(); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success pull-right">
                        <?= \Yii::t('backend', $model->isNewRecord ? 'Add Company' : 'Edit Company'); ?>
                    </button>
                </div>

                <?php ActiveForm::end(); ?>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div>