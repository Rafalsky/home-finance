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

use \common\models\base\ProductPrice as BaseProductPrice;
use yii\db\Exception;
use yii\db\Expression;

/**
 * This is the model class for table "product_price".
 */
class ProductPrice extends BaseProductPrice
{
    public static function updateIfRequired($productId, $price)
    {
        $max = \Yii::$app->db->createCommand('SELECT max(id) as max FROM ' . self::tableName() . ' WHERE product_id = ' . $productId)->queryScalar();
        if (!$max || !($lastModel = self::findOne($max)) || $lastModel->price != $price) {
            $model = new self;
            $model->product_id = $productId;
            $model->price = (float) str_replace(',', '.', $price);
            if (!$model->save()) {
                throw new Exception(\Yii::t('common', 'Cannot save {modelName} model', ['{modelName}' => 'ProductPrice']));
            }
        }
    }

    public function beforeValidate()
    {
        $this->updateTimestamps();
        return parent::beforeValidate();
    }

    private function updateTimestamps()
    {
        if ($this->isNewRecord) {
            $this->created_at = new Expression('NOW()');
        } else {
            $this->updated_at = new Expression('NOW()');
        }
    }
}
