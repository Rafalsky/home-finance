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
 * @var $model \common\models\Shop
 */
use \yii\bootstrap\ActiveForm;

?><div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= \Yii::t('backend', 'Add new shop'); ?></h3></div>
            <div class="panel-body">

                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => false,
                ]); ?>
                <div class="form-group">
                    <?= $form->field($model, 'name'); ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'company_id')->label($model->getAttributeLabel('company'))->dropDownList(common\models\Company::find()->all(), ['prompt' => \Yii::t('backend', 'Select company')]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'address'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'city'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'comment')->textarea(); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success pull-right">
                        <?= \Yii::t('backend', $model->isNewRecord ? 'Add Shop' : 'Edit Shop'); ?>
                    </button>
                </div>

                <?php ActiveForm::end(); ?>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div>