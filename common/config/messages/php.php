<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return \yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/_base.php'),
    [
        // 'php' output format is for saving messages to php files.
        'format' => 'php',
        // Root directory containing message translations.
        'messagePath' => Yii::getAlias('@common/messages'),
        // boolean, whether the message file should be overwritten with the merged messages
        'overwrite' => true,
    ]
);
