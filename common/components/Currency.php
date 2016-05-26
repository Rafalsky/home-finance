<?php
/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\components;

use yii\base\Object;

class Currency extends Object
{
    public function getList()
    {
        return [
            'PLN' => \Yii::t('common', 'Poland Zloty'),
            'USD' => \Yii::t('common', 'United States Dollar'),
        ];
    }
}
