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
 * @author Eugene Terentev <eugene@terentev.net>
 * @var string $maintenanceText
 * @var int|string $retryAfter
 */
?>
<div id="maintenance-content" style="margin-top: 10%">
    <p class="well">
        <?= Yii::t('common', $maintenanceText, [
            'retryAfter' => $retryAfter,
            'adminEmail' => Yii::$app->params['adminEmail']
        ]) ?>
    </p>
</div>