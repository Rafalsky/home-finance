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

class EditableTable extends BaseAssetBundle
{
    public $depends = [
        AppAsset::class
    ];

    public $js = [
        'js/editableTable.min.js'
    ];

    public $css = [
        'css/editableTable.min.css'
    ];
}
