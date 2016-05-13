<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\components\maintenance;

use yii\web\AssetBundle;

/**
 * Class MaintenanceAsset
 * @package common\components\maintenance
 * @author Eugene Terentev <eugene@terentev.net>
 */
class MaintenanceAsset extends AssetBundle
{
    public $sourcePath = '@common/components/maintenance/assets';

    public $css = [
        'css/maintenance.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
