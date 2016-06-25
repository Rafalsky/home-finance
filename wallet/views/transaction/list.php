<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use \common\models\Receipt;
use \wallet\assets\EditableTable;

/**
 * @var Receipt[] $receipts
 */
EditableTable::register($this);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= \Yii::t('wallet', 'Transactions'); ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php if($receipts) : ?>
                        <table id="example2" class="table table-bordered table-hover dataTable editable-table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr>
                                <th><?= \Yii::t('wallet', 'Type'); ?></th>
                                <th><?= \Yii::t('wallet', 'Shop'); ?></th>
                                <th><?= \Yii::t('wallet', 'Date'); ?></th>
                                <th><?= \Yii::t('wallet', 'Total Price'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($receipts as $receipt) : ?>
                                    <tr class="gradeX" data-url="<?= \Yii::$app->urlManager->createUrl(['/transaction/receipt', 'id' => $receipt->id]); ?>">
                                        <td><?= $receipt->id; ?></td>
                                        <td><?= $receipt->shop->name; ?></td>
                                        <td><?= $receipt->date; ?></td>
                                        <td><?= $receipt->getTotalPrice(); ?>&nbsp;zł</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <?= \Yii::t('wallet', 'There is not transactions yet.'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-b-30">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/transaction/new-receipt']); ?>" class="btn btn-danger waves-effect waves-light">
                            <?= \Yii::t('wallet', 'New Receipt'); ?>
                        </a>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/transaction/new-income']); ?>" class="btn btn-success waves-effect waves-light pull-right">
                            <?= \Yii::t('wallet', 'New Income'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>