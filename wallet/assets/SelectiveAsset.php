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

class SelectiveAsset extends AssetBundle
{
    public $sourcePath = '@bower/selectize/dist';

    public $depends =[
        'yii\bootstrap\BootstrapAsset',
    ];
    public $css = [
        'css/selectize.css',
        'css/selectize.bootstrap3.css'
    ];

    public $js = [
        'js/standalone/selectize.js'
    ];
}
