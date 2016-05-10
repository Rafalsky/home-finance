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

use \common\models\base\Shop as BaseShop;

/**
 * This is the model class for table "shop".
 */
class Shop extends BaseShop
{
    public static function getAllAvailable()
    {
        $shops = [];
        foreach (\Yii::$app->db->createCommand('SELECT `id`, `name` FROM shop')->queryAll() as $shop) {
            $shops[$shop['id']] = $shop['name'];
        }
        return $shops;
    }
}
