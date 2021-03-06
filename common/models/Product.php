<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

use \common\models\base\Product as BaseProduct;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
{
    public static function findOrCreate($attributes)
    {
        if ($model = self::find()->where($attributes)->one()) {
            return $model;
        }
        $model = new self;
        $model->attributes = $attributes;
        return $model;
    }

    public function beforeValidate()
    {
        $this->updateTimestamps();
        return parent::beforeValidate();
    }

    // -- private

    private function updateTimestamps()
    {
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
    }
}
