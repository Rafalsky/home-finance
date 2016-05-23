<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\assets;

use yii\web\AssetBundle;

class Html5shiv extends AssetBundle
{
    public $sourcePath = '@bower/html5shiv';
    public $js = [
        'dist/html5shiv.min.js'
    ];

    public $jsOptions = [
        'condition' => 'lt IE 9'
    ];
}
