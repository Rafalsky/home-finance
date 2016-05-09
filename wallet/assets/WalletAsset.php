<?php

/**
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\assets;

use yii\web\AssetBundle;

class WalletAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/style.css'
    ];
    public $js = [
        'js/app.js'
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
        \common\assets\AdminLte::class,
        \common\assets\Html5shiv::class
    ];
}
