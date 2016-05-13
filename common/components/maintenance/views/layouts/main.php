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
 * @var $this \yii\web\View
 * @var $content string
 */
use yii\helpers\Html;

\yii\bootstrap\BootstrapAsset::register($this)
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?php echo \Yii::$app->language; ?>">
    <head>
        <meta charset="<?php echo \Yii::$app->charset; ?>">
        <title><?php echo Html::encode(Yii::$app->name); ?></title>
        <?php $this->head(); ?>
    </head>
    <body class="maintenance-body">
    <?php $this->beginBody() ?>
        <div class="container">
            <?php echo $content; ?>
        </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>