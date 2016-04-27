<?php

/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models\base;

use \app\models\Product;
use \app\models\Receipt;

/**
 * This is the base-model class for table "product_price".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $receipt_id
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Product $product
 * @property \common\models\Receipt $receipt
 * @property string $aliasModel
 */
abstract class ProductPrice extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_price}}';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @param bool $plural
     * @return string
     */
    public function getAliasModel($plural = false)
    {
        if ($plural) {
            return \Yii::t('app', 'ProductPrices');
        } else {
            return \Yii::t('app', 'ProductPrice');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'created_at'], 'required'],
            [['product_id', 'receipt_id'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['product_id' => 'id']
            ],
            [
                ['receipt_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Receipt::className(),
                'targetAttribute' => ['receipt_id' => 'id']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'product_id' => \Yii::t('app', 'Product ID'),
            'receipt_id' => \Yii::t('app', 'Receipt ID'),
            'price' => \Yii::t('app', 'Price'),
            'created_at' => \Yii::t('app', 'Created At'),
            'updated_at' => \Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            [
                'id' => \Yii::t('app', 'ID'),
                'product_id' => \Yii::t('app', 'Product Id'),
                'receipt_id' => \Yii::t('app', 'Receipt Id'),
                'price' => \Yii::t('app', 'Price'),
                'created_at' => \Yii::t('app', 'Created At'),
                'updated_at' => \Yii::t('app', 'Updated At'),
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::className(), ['id' => 'receipt_id']);
    }
}
