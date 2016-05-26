<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

?>
<div class="row">
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-body">
                <div class="m-b-30">
                    <a href="<?= \Yii::$app->urlManager->createUrl(['shop/new']); ?>" class="btn btn-primary waves-effect waves-light">
                        <?= \Yii::t('wallet', 'Add'); ?> <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped navigation-table">
            <thead>
            <tr>
                <th><?= \Yii::t('wallet', 'ID'); ?></th>
                <th><?= \Yii::t('wallet', 'Name'); ?></th>
                <th><?= \Yii::t('wallet', 'Address');?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (\common\models\Shop::find()->all() as $shop) : ?>
                <tr class="gradeX" data-url="<?= \Yii::$app->urlManager->createUrl(['/shops/edit', ['id' => $shop->id]]); ?>">
                    <td><?= $shop->id; ?></td>
                    <td><?= $shop->name; ?></td>
                    <td><?= $shop->address; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>