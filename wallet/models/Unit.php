<?php
/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wallet\models;

use yii\base\Model;

class Unit extends Model
{
    const KG = 1000;
    const DECAGRAM = 1001;
    const GRAM = 1002;
    const LITRES = 2000;
    const MILILITRES = 2001;
    const ITEM = 3000;

    public static function getAll()
    {
        return [
            self::KG => \Yii::t('wallet', 'Kg'),
            self::DECAGRAM => \Yii::t('wallet', 'Decagram'),
            self::GRAM => \Yii::t('wallet', 'Gram'),
            self::LITRES => \Yii::t('wallet', 'Litres'),
            self::MILILITRES => \Yii::t('wallet', 'Mililitres'),
            self::ITEM => \Yii::t('wallet', 'Item')
        ];
    }
}
