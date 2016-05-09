<?php
/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapAsset;

abstract class BaseAssetBundle extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}
