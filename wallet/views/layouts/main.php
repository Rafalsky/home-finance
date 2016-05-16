<?php
/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var $this yii\web\View
 */
?>
<?php $this->beginContent('@wallet/views/layouts/common.php'); ?>
    <div class="box">
        <div class="box-body">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>