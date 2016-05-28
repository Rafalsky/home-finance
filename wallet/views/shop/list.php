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
 * @var \common\models\Shop[] $shops
 */
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= \Yii::t('wallet', 'Shops list'); ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php if($shops) : ?>
                        <<table class="table table-bordered table-striped navigation-table">
                            <thead>
                            <tr>
                                <th><?= \Yii::t('wallet', 'ID'); ?></th>
                                <th><?= \Yii::t('wallet', 'Name'); ?></th>
                                <th><?= \Yii::t('wallet', 'Address'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($shops as $shop) : ?>
                                <tr class="gradeX" data-url="<?= \Yii::$app->urlManager->createUrl(['/shops/edit', ['id' => $shop->id]]); ?>">
                                    <td><?= $shop->id; ?></td>
                                    <td><?= $shop->name; ?></td>
                                    <td><?= $shop->address; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <?= \Yii::t('wallet', 'There is not shops yet.'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="m-b-30">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/shop/new']); ?>" class="btn btn-primary waves-effect waves-light">
                            <?= \Yii::t('wallet', 'Add'); ?> <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>