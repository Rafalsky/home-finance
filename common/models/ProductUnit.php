<?php
/**
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

class ProductUnit extends \common\models\base\ProductUnit
{
    public static function getAll()
    {
        $units = [];
        foreach (self::find()->all() as $productUnit) {
            $units[$productUnit->id] = $productUnit->name;
        }
        return $units;
    }
}
