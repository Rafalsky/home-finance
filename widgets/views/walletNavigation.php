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
            'label' => Yii::t('app', 'Home'),
            'url' => ['/wallet'],
            'icon' => 'home'
        ],
        [
            'label' => Yii::t('app', 'Transactions'),
            'icon' => 'question-sign',
            'items' => [

                [
                    'label' => Yii::t('app', 'List'),
                    'url' => ['/wallet/transactions/list'],
                    'icon' => 'question-sign',
                ],

                [
                    'label' => Yii::t('app', 'Add Receipt'),
                    'url' => ['/wallet/transactions/add-receipt'],
                    'icon' => 'question-sign',
                ],
            ],
        ],
        [
            'label' => Yii::t('app', 'Shops'),
            'icon' => 'question-sign',
            'items' => [

                [
                    'label' => Yii::t('app', 'List'),
                    'url' => ['/wallet/shop/list'],
                    'icon' => 'question-sign',
                ],

                [
                    'label' => Yii::t('app', 'New'),
                    'url' => ['/wallet/shop/new'],
                    'icon' => 'question-sign',
                ],
            ],
        ],
        [
            'label' => Yii::t('app', 'Companies'),
            'icon' => 'question-sign',
            'items' => [

                [
                    'label' => Yii::t('app', 'List'),
                    'url' => ['/wallet/company/list'],
                    'icon' => 'question-sign',
                ],

                [
                    'label' => Yii::t('app', 'New'),
                    'url' => ['/wallet/company/new'],
                    'icon' => 'question-sign',
                ],
            ],
        ],
    ],
]);
