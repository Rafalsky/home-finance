<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\assets\transactions\receipt;

use wallet\assets\AppAsset;
use wallet\assets\BaseAssetBundle;

class Form extends BaseAssetBundle
{
    public $depends = [
        AppAsset::class
    ];

    public $css = [
        'css/transactions/form.min.css'
    ];

    public $js = [
        'js/transactions/form.min.js'
    ];
}
