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

/**
 * @var Receipt[] $receipts
 */
?>

<div class="row">
    <div class="col-lg-12">
        <table id="receipts-list-table" class="table table-bordered table-striped navigation-table">
            <thead>

            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
    </div>
</div>


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
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr>
                                <th><?= \Yii::t('wallet', 'ID'); ?></th>
                                <th><?= \Yii::t('wallet', 'Shop'); ?></th>
                                <th><?= \Yii::t('wallet', 'Date'); ?></th>
                                <th><?= \Yii::t('wallet', 'Total Price'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($receipts as $receipt) : ?>
                                    <tr class="gradeX" data-url="<?= \Yii::$app->urlManager->createUrl(['/transaction/receipt', ['id' => $receipt->id]]); ?>">
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
                <div class="col-sm-7">
                    <div class="m-b-30">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/transaction/add-receipt']); ?>" class="btn btn-success waves-effect waves-light">
                            <?= \Yii::t('wallet', 'New Transaction'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>