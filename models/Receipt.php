<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use \app\models\base\Receipt as BaseReceipt;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "receipt".
 */
class Receipt extends BaseReceipt
{
    public $file;
    
    public function getTotalPrice()
    {
        $price = 0;
        foreach ($this->receiptProducts as $product) {
            $price += $product->total_price;
        }
        return (float) $price;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['shop_id', 'date'], 'required'],
            [['shop_id', 'is_live'], 'integer'],
            [['comment'], 'string'],
            [['image'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['date'], 'date', 'format' => 'php:Y-m-d']
        ]);
    }
}
