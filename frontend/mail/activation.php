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
 * @var $this \yii\web\View
 * @var $url \common\models\User
 */
?>
<?= Yii::t('frontend', 'Your activation link: {url}', ['url' => Yii::$app->formatter->asUrl($url)]);
