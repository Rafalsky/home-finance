<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use kartik\sidenav\SideNav;

echo SideNav::widget([
    'type' => SideNav::TYPE_WARNING,
    'items' => [
        [
            'label' => Yii::t('wallet', 'Home'),
            'url' => ['/wallet'],
            'icon' => 'home'
        ],
        [
            'label' => Yii::t('wallet', 'Transactions'),
            'icon' => 'question-sign',
            'items' => [

                [
                    'label' => Yii::t('wallet', 'List'),
                    'url' => ['/wallet/transactions/list'],
                    'icon' => 'question-sign',
                ],

                [
                    'label' => Yii::t('wallet', 'Add Receipt'),
                    'url' => ['/wallet/transactions/add-receipt'],
                    'icon' => 'question-sign',
                ],
            ],
        ],
    ],
]);
