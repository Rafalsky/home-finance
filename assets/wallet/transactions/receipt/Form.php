<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\assets\wallet\transactions\receipt;

use app\assets\AppAsset;
use app\assets\BaseAssetBundle;

class Form extends BaseAssetBundle
{
    public $depends = [
        AppAsset::class
    ];

    public $js = [
        'js/wallet/transactions/form.min.js'
    ];
}
