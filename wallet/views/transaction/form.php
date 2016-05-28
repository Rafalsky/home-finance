<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/** @var common\models\Receipt $receipt */
wallet\assets\transactions\receipt\Form::register($this);
?>
<div id="edit-receipt">
    <?php /** @var ActiveForm $form */ ?>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-3\">{label}</div><div class=\"col-lg-9\">{input}</div><br/><div class=\"col-lg-9 col-md-offset-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <div class="row">
        <div class="col-lg-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= \Yii::t('wallet', 'Receipt Details'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <?= $form->field($receipt, 'shop_id', ['template' => "{label}"])->label($receipt->getAttributeLabel('shop')); ?>
                            </div>
                            <div class="col-lg-7">
                                <?= $form->field($receipt, 'shop_id', ['template' => "{input}"])->dropDownList(common\models\Shop::getAllAvailable(), ['prompt' => \Yii::t('wallet', 'Select shop')]); ?>
                            </div>
                            <div class="col-lg-1">
                                <a href="<?= \Yii::$app->urlManager->createUrl('/transactions/list'); ?>"
                                   class="btn btn-success">
                                    <?= \Yii::t('wallet', 'Add new shop'); ?>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-9">
                            <?= $form->field($receipt, 'shop_id', ['template' => "{error}"])->error(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($receipt, 'date')->widget(DatePicker::class, [
                                'dateFormat' => 'yyyy-MM-dd',
                            ]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($receipt, 'comment')->textarea(['placeholder' => \Yii::t('wallet', 'Comments')]); ?>
                        </div>
                    </div>
                </div>  <!-- End panel-body -->
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= \Yii::t('wallet', 'Products'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <table id="receipt-table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 40%"><?= Yii::t('wallet', 'Product'); ?></th>
                                    <th style="width: 15%"><?= Yii::t('wallet', 'Producer'); ?></th>
                                    <th style="width: 10%"><?= Yii::t('wallet', 'Count'); ?></th>
                                    <th style="width: 15%"><?= Yii::t('wallet', 'Unit Price'); ?></th>
                                    <th style="width: 15%"><?= Yii::t('wallet', 'Total Price'); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                <?php foreach ($receipt->receiptProducts as $receiptProduct) : ?>
                                    <?= $this->render('_productTableRow', ['number' => ++$number, 'receiptProduct' => $receiptProduct]); ?>
                                <?php endforeach; ?>
                                <?= $this->render('_productTableRow', ['number' => ++$number]); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="border-radius: 0;">
                            <div class="col-md-3 col-md-offset-9">
                                <hr>
                                <h3 class="text-right"><span id="totalPrice"><?= $receipt->getTotalPrice(); ?></span>&nbsp;zł
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?= \Yii::$app->urlManager->createUrl('/transaction/list'); ?>" class="btn btn-danger">
                <?= \Yii::t('wallet', 'Back'); ?>
            </a>
            <button type="submit"
                    class="btn-submit btn btn-success pull-right"><?= \Yii::t('wallet', 'Update'); ?></button>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= \Yii::t('wallet', 'Receipt Image'); ?></h3>
                </div>
                <div class="panel-body">
                    <img src="/img/image-placeholder.jpg" alt="" style="width: 100%">
                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <?= $form->field($receipt, 'file')->fileInput(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
